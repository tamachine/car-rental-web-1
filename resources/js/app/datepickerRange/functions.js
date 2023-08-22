/**
 * Inits the calendar dates
 * @param {date} start 
 * @param {date} end 
 */
function initDates(start, end) {    
    //format the selected date shown in the inputs
    formatDateInputs(start, end);

    //set the date values in the inputs
    setDateInputs(start, end);

    //manage the search/continue button visibility
    buttonsVisibility(start, end);

    //manage the input values for the mobile version
    mobileInputDatesVisibility(start);   
}

/**
 * Manages the visibiliity of the input values for the mobile version
 * @param {date} start 
 */
function mobileInputDatesVisibility(start) {
    
    const emptyInputMobile  = document.getElementById('mobile-empty-dates')
    const datesMobile       = document.querySelectorAll('.mobile-dates')

    if(start) {                                   
        if (isMobile) {
            emptyInputMobile.classList.add('hidden');

            for (let i = 0; i < datesMobile.length; i++) {
                datesMobile[i].classList.remove('hidden');
            }                
        }         
    } else {            
        if (isMobile) {
            emptyInputMobile.classList.remove('hidden');
            
            for (let i = 0; i < datesMobile.length; i++) {
                datesMobile[i].classList.add('hidden');
            }
        }        
    }
}

/**
 * Manages the visibiliity of the search/continue buttons
 * @param {date} start 
 * @param {date} end 
 */
function buttonsVisibility(start, end) {
    const searchButton   = document.getElementById('search__button');
    const continueButton = document.getElementById('continue-date__button')

    if(start) {
        document.getElementById('date-inputs').classList.add('active')
        searchButton.setAttribute('disabled')
        continueButton.setAttribute('disabled')
        
        if(end) {
            searchButton.removeAttribute('disabled')
            continueButton.removeAttribute('disabled')
        }           
    } else {
        document.getElementById('date-inputs').classList.remove('active')
        searchButton.setAttribute('disabled')
        continueButton.setAttribute('disabled')           
    }
}

/**
 * Sets the dates in the inputs toggling its class
 * @param {date} start 
 * @param {date} end 
 */
function setDateInputs(start, end) {
    setDateInput(start, '.start-date');
    setDateInput(end, '.end-date');
}

/**
 * Sets the date in the input defined by the selector string and toggles the class
 * @param {date} date 
 * @param {String} selector 
 */
function setDateInput(date, selector) {        
    const elements = document.querySelectorAll(selector)

    for (let i = 0; i < elements.length; i++) {
        if (date) {
            elements[i].value = date.format( 'YYYY-MM-DD', appLocale())
        } else {
            elements[i].value = ''
        }

        toggleClassToInputGroup(elements[i], 'active', date)
    }  
}    

/**
 * Toggle the date inputs class
 * @param {element} input 
 * @param {String} klass 
 * @param {boolean} add 
 */
function toggleClassToInputGroup(input, klass, add = true) {				
    if (add) {
        input.parentElement.classList.add(klass)
    } else {
        input.parentElement.classList.remove(klass)
    }
}	

/**
 * returns the start date from the url
 * @returns {String}
 */
function getStartDateFromUrl() {
    if((typeof carSearchUrlParams !== 'undefined')) return carSearchUrlParams.startDate;    
}

/**
 * returns the end date from the url
 * @returns {String}
 */
function getEndDateFromUrl() {
    if((typeof carSearchUrlParams !== 'undefined')) return carSearchUrlParams.endDate;  
}

