const showElement = (element) => {
    element.classList.add("shown")
}

const hideElement = (element) => {
    element.classList.remove("shown")
}

const elementById = (id) => {
    return document.getElementById(id)
}

const sleep = (milliseconds) => {
    return new Promise(resolve => setTimeout(resolve, milliseconds))
}