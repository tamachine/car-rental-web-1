/**
 * Formats the day name displayed in the header to short it to two characters
 * @param {Object} calendarDayName 
 */
function formatCalendarDayName(calendarDayName) {    
    
    let name = calendarDayName.textContent;

    if (name.length >= 2) {
        const shortName = name.slice(0, -1);
        calendarDayName.textContent = shortName;
    }
}

/**
 * Formats start and end date inputs
 * @param {Date} date 
 * @param {Date} end 
 */
function formatDateInputs(start, end) {
    formatWeekDay(start, '.start-dayweek');
    formatWeekDay(end,   '.end-dayweek');

    formatDay(start, '.start-day');
    formatDay(end,   '.end-day');

    formatMonth(start, '.start-month');
    formatMonth(end,   '.end-month');
}

/**
 * Formats the day of the week in dates inputs
 * @param {Date} date 
 * @param {String} selector 
 */
function formatWeekDay(date, selector) {
    const elements = document.querySelectorAll(selector)    

    if (date) {  
        for (let i = 0; i < elements.length; i++) {
            elements[i].innerHTML = weekDays(date.getDay())  
        }
    }   
}

/**
 * Formats the day of the month in dates inputs
 * @param {Date} date 
 * @param {String} selector 
 */
function formatDay(date, selector) {
    const elements = document.querySelectorAll(selector)    

    if (date) {  
        for (let i = 0; i < elements.length; i++) {
            elements[i].innerHTML = date.getDate()   
        }
    }   
}

/**
 * Formats the month name in dates inputs
 * @param {Date} date 
 * @param {String} selector 
 */
function formatMonth(date, selector) {
    const elements = document.querySelectorAll(selector)    

    if (date) {  
        for (let i = 0; i < elements.length; i++) {
            elements[i].innerHTML = monthNames(date.getMonth())
        }
    }   
}