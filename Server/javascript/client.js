let buzzer = elementById('buzzer')
let buzzered = elementById('buzzered')


const buzzerAction = async (team) => {
    showElement(buzzered)
    fetch('/api/set.php?team=' + team)
    await sleep(3000)
    hideElement(buzzered)
}

const buzzerToSquare = () => {
    buzzer.style.height = buzzer.clientWidth.toString() + "px"
}

buzzerToSquare()
window.addEventListener("resize", buzzerToSquare)