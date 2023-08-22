/**
 * Translates the tooltip text
 * @param {String} locale
 * @param {String} day
 * @returns {String}
 */    
function tooltipText(day) {
    let tooltipTranslated = {};

    switch (appLocale()) {
        case 'es':
            tooltipTranslated = {
                one: 'día',
                other: 'días'
            };
            break;

        default:
            tooltipTranslated = {
                one: 'day',
                other: 'days'
            };
            break;
    }
    return tooltipTranslated[day];
}

/**
 * Translates the month name text
 * @param {number} month
  * @returns {String}
 */   
function monthNames(month) {
    let monthNames = [];       

    switch (appLocale()) {
        case 'es':
            monthNames = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
            break;

        default:
            monthNames = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

            break;
    }
    return monthNames[month];
}

/**
 * Returns the day of the week with 3 characters
 * @param {Number} day 
 * @returns {String}
 */
function weekDays(day) {
    let weekDays = [];       

    switch (appLocale()) {
        case 'es':
            weekDays = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];
            break;

        default:
            weekDays = ["Sun","Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

            break;
    }
    return weekDays[day];
}