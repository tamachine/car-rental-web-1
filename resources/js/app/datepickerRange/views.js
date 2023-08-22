/**
 * Disable days
 * @param {date} date 
 * @param {element} target 
 */
function setDisabledDays(date, target) {
    if (date <= new Date()) target.classList.add('disabled') //disable days before tomorrow
}

/**
 * add the data-day attribute to the days in order to use it as a 'content' in the css ::after selector
 * @param {date} date 
 * @param {element} target 
 */
function addDataDayAttribute(date, target) {
    target.dataset.day = date.getDate()
}

/**
 * Scrolls to the top
 * @param {element} target 
 */
function footerScroll(target) {
    let mainElement = target.querySelector('main');

    if (scrollTopPosition !== 'undefined'){
        mainElement.scrollTop = scrollTopPosition;
    }
}