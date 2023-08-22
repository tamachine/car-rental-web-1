function noScroll() {
    const body = document.querySelector('body');    
    body.classList.add('full-height');    
}

function defaultScroll() {
    const body = document.querySelector('body');    
    body.classList.remove('full-height');
}

function scrollToCalendar() {
    if (getSearchBarPositionTop() < 600) {
        document.querySelector('#search-bar').scrollIntoView();
    }
}

function scrollToTimes() {
    // Si la selección de horas no aparece en pantalla se hace un pequeño scroll
    if (window.innerHeight < 620) {
        let scrollMovement = 700 - window.innerHeight
        window.scrollBy(0, scrollMovement)
    }
}
