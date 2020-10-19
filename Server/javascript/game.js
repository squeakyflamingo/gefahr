let buzzered = 0
let currentIdentifier = 0
let reset = document.getElementById("resetBuzzerButton")

const startBuzzer = () => {
    setInterval(
        () => {
            if (buzzered == 0) {
                fetch('/api/read.php').then(response => {
                    return response.text()
                }).then(data => {
                    if (data != "reset") buzzerAction(data)
                })
            }
        },
        200
    )
}

const randomSuperJeopardy = (count) => {
    let superJeopardy = []

    for (let i = 0; i < count; i++) {
        let value_i = Math.floor(Math.random() * 5)
        let value_j = Math.floor(Math.random() * 5)
        superJeopardy.push([value_i, value_j])
    }
}

const buzzerAction = (team) => {
    buzzered = team
    showElement(reset)
    showElement(document.querySelector(`.overlayTeambuzzer#${buzzered}`))
    showElement(document.querySelector(`.buzzerIndicator#${buzzered}`))

    if (currentIdentifier != 0) showElement(elementById(`free${currentIdentifier}`))
}

const resetBuzzer = () => {
    hideElement(reset)
    hideElement(document.querySelector(`.buzzerIndicator#${buzzered}`))
    fetch('/api/set.php?reset')
    if (currentIdentifier != 0) hideElement(elementById(`free${currentIdentifier}`))
    buzzered = 0
}

const showAnswer = (identifier) => {
    currentIdentifier = identifier
    showElement(elementById(`overlayAnswer${currentIdentifier}`))

    if (buzzered != 0) showElement(elementById(`free${currentIdentifier}`))
}

const closeAnswer = (element) => {
    hideElement(element.parentElement.parentElement.parentElement)
    showElement(elementById(`overlayQuestion${element.id.slice(-2)}`))
}

const closeQuestion = (element, value) => {
    hideElement(element)

    if (buzzered != 0) {
        points = document.querySelector(`.points#${buzzered}`)
        points.innerHTML = parseInt(points.innerHTML) + parseInt(value)
        elementById(`task${element.id.slice(-2)}`).classList.add("completed")
    }
}