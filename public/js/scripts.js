function accordion(config) {
    return { 
        open: false,

        showPlus: true,

        showMinus: false,       
        
        group : null,

        init() {
            this.group = config.group                       
        },

        click() {            
            if(this.group) this.$dispatch('close-accordion-'+this.group, { id: this.$id('accordion') }) //close all other accordions in the group

            this.open = !this.open                
            
            this.toggleIcon()           
        },           
        
        close(id) {
            
            if (this.$id('accordion') != id) {            
                this.open = false

                this.toggleIcon()
            }
        },

        toggleIcon() {
            setTimeout(
                () => {
                    
                    this.showMinus = this.open
                
                    this.showPlus  = !this.open
                    
                }                        
            , 300
            )
        }
    }
}
blogPagination = function () {
    return {

        hidePagination: true,

        init: function () {      

            this.scrolling();                 
            
        },

        paginationVisibility: function() {   

            return !this.hidePagination;    

        },

        scrolling: function() {       
              
            let parent = this.$refs.paginationParent;

            let prevElement = this.$refs.prevElement;

            let nextElement = this.$refs.nextElement;

            if(prevElement) {
                
                this.setHidePagination(this.$refs.prevElement, parent);

            } else if(nextElement) {
                
                this.setHidePagination(this.$refs.nextElement, parent);

            }                        
        },

        setHidePagination: function(el, parent) {
            
            let parentBottom = parent.getBoundingClientRect().top + parent.offsetHeight;            
        
            let elBottom = (el.offsetTop + (el.offsetHeight / 2));  
            
            this.hidePagination = (parentBottom < elBottom);     

        }
        
    };
}



function carSearchBar() {
    return {
        openCalendar: false,
        showOpenDateInput: false,
        showOpenTimesInput: false,
        showDate: false,
        showLocations: false,
        showOpenLocationsInput: false,
        showDefault: false, // mobile default time and location
        showResume: false, // edit default information
        differentLocation: false,
        showBack: false,       

        openCalendarClick() {
            this.openCalendar = true
            this.showDate = true
            this.$refs.startDateButton.click()
            this.showLocations = false
            this.showBack = false
            this.showDefault = false

            if (isMobile) {
                this.showOverlay = false

                noScroll()
            }

            if (!isMobile) {
                this.showOverlay = true

                scrollToCalendar()
                
                this.showOpenDateInput = true
                this.showOpenTimesInput = false
                this.showOpenLocationsInput = false
            }

            this.moveBulletValueElement()  //we call it here because from timePicker.js, the with input is not rendered until the layer is shown  
        },

        openTimeClick() {
            this.openCalendar = true
            this.showDate = true
            this.$refs.startDateButton.click()
            this.showLocations = false
            this.showBack = false
            
            if (isMobile) {
                noScroll()
            }
            
            if (!isMobile) {
                this.showOverlay = true
                this.showOpenDateInput = false
                this.showOpenTimesInput = true
                this.showOpenLocationsInput = false
                scrollToTimes()
            }

            this.moveBulletValueElement() //we call it here because from timePicker.js, the with input is not rendered until the layer is shown
        },

        openLocationsClick() {
            this.openCalendar = false
            this.showOpenDateInput = false
            this.showOpenTimesInput = false
            this.showLocations = true
            this.showOpenLocationsInput = true
            this.showBack = true
            this.showOverlay = true
            this.showBack = false
            
            locationsOpenTransition();            
        },

        moveBulletValueElement() {
            this.$nextTick(() => { 
                const rangeInput = document.getElementsByClassName('range-input');

                moveBulletValueElement(rangeInput[0].value, rangeInput[0], rangeInput[0].previousElementSibling);   
                moveBulletValueElement(rangeInput[1].value, rangeInput[1], rangeInput[1].previousElementSibling);   
            });  
        },

        openOverlay() {
            if (vWidth > 767) {
                this.showOverlay = true
            } else {
                this.showOverlay = false
            }
        },

        closePopOver() {
            this.openCalendar = false
            this.showOpenDateInput = false
            this.showOpenTimesInput = false
            this.showDate = false
            this.showLocations = false
            this.showOpenLocationsInput = false
            this.showOverlay = false
            this.showBack = false
            this.modalOpen = false

            if (isMobile) {
                defaultScroll()
            }
        },

        toggleLocation() {
            this.differentLocation = !this.differentLocation,
            toggleLocation()
        },

        continueToDefault() {
            this.showDate = true
            this.showBack = true
            this.showDefault = true
            this.showResume = false
        },

        editDefault() {
            this.showResume = true
            this.showDate = false
            this.showDefault = false
            this.showBack = true
        },

        backShowDate() {
            this.showDate = true
            this.showBack = false
            this.showDefault = false
            this.showResume = false
        },

        continueMobileButton() {
            this.checkIfAnySelectIsSelected() ? this.editDefault() : this.continueToDefault()
        },

        checkIfAnySelectIsSelected() {
            const startHoursList     = document.getElementById('start-hours-list');
            const endHoursList       = document.getElementById('end-hours-list');
            const startLocationsList = document.getElementById('start-locations-list');
            const endLocationsList   = document.getElementById('end-locations-list');
    
            return (
                startHoursList.selectedIndex     !== 0 ||
                endHoursList.selectedIndex       !== 0 ||
                startLocationsList.selectedIndex !== 0 ||
                endLocationsList.selectedIndex   !== 0
                )            
        },

        mobileSubmit() {
            document.getElementById('search-bar').submit()
        },

        mobileSelectableChange(id, event) {
            const input = document.getElementById(id);

            input.value = event.target.value
        },       
    }
}


/********************
   POSITION POPOVER DEPENDING ON SPACE (Top or bottom car-search-bar)
********************/
document.addEventListener('DOMContentLoaded', () => {    


    /********************
     Click on mobile search button
    ********************/
    const searchButtonMobile = document.getElementById('mobile-search__button')
    const searchBarMobile = document.getElementById('mobile-search-bar')

    const startInput = document.querySelectorAll('.start-date')
    const endInput = document.querySelectorAll('.end-date')

    if(searchButtonMobile){
        searchButtonMobile.addEventListener('click', function(e) {
            if (startInput[0].value == '' || endInput[0].value == '') {
                e.preventDefault();
                searchBarMobile.click()
            } else {
                // ATENCIÓN: FALTA FUNCIÓN DE ENVIAR
                // Aquí irá la función de enviar formulario
                console.log('Enviar')
            }
        })    
    }
    
    /********************
     Click on mobile hours picker
    ********************/
    const startInputHour = document.getElementById('search-input-start-hour')
    const endInputHour = document.getElementById('search-input-end-hour')
    const startSelectHour = document.getElementById('start-hours-list')
    const endSelectHour = document.getElementById('end-hours-list')


    if(startInputHour) {
        startInputHour.addEventListener('click', function(e) {
            e.preventDefault();
            startSelectHour.click()
        })
    }
    
    if(endInputHour) {
        endInputHour.addEventListener('click', function(e) {
            e.preventDefault();
            endSelectHour.click()
        })
    }
    

    /******************
        SELECT TIME: select and show time selected on mobile
    ******************/

    const timeStart = {
        hoursList: document.getElementById('start-hours-list'),
        resumeTime: document.getElementById('resume-time--start'),
        resumeType: document.getElementById('resume-type--start')
    };

    const timeEnd = {
        hoursList: document.getElementById('end-hours-list'),
        resumeTime: document.getElementById('resume-time--end'),
        resumeType: document.getElementById('resume-type--end')
    };

    function showTimeValue(range) {
        const selectedOption = range.hoursList.options[range.hoursList.selectedIndex];
        const time = selectedOption.getAttribute('time');
        const type = selectedOption.getAttribute('type');

        range.resumeTime.innerHTML = time;
        range.resumeType.innerHTML = type;
    }

    if(timeStart.hoursList) {
        timeStart.hoursList.addEventListener('change', () => showTimeValue(timeStart));
    }
    
    if(timeEnd.hoursList) {
        timeEnd.hoursList.addEventListener('change', () => showTimeValue(timeEnd));
    }

    /******************
        SELECT LOCATION: select and show time selected on mobile
    ******************/

    const locationStart = {
        locationsList: document.getElementById('start-locations-list'),
        resumeLocation: document.getElementById('resume-location--start'),
    };

    const locationEnd = {
        locationsList: document.getElementById('end-locations-list'),
        resumeLocation: document.getElementById('resume-location--end'),
    };

    function showLocationValue(range) {
        const selectedOption = range.locationsList.options[range.locationsList.selectedIndex];
        const location = selectedOption.getAttribute('value');

        range.resumeLocation.innerHTML = location;
    }

    if(locationStart.locationsList) {
        locationStart.locationsList.addEventListener('change', () => showLocationValue(locationStart));
    }
    
    if(locationEnd.locationsList) {
        locationEnd.locationsList.addEventListener('change', () => showLocationValue(locationEnd));
    }
        
});

function locationsOpenTransition() {
    
    const locationsLayer = document.getElementById('locations__layer');
    const locations      = document.getElementById('locations');

    let locationsLayerHeight = getHiddenHeight(locationsLayer);
    
    locations.style.height =  locationsLayerHeight + 'px';

    setTimeout(function(){
        locations.style.height = 'auto'
    }, 200);
    
}

function getHiddenHeight(el) {
    if(!el?.cloneNode) {
        console.log('null');
        return null;
    }

    const clone = el.cloneNode(true);        
    
    Object.assign(clone.style, {
        overflow: 'visible',
        height: 'auto',
        maxHeight: 'none',
        opacity: '0',
        visibility: 'hidden',
        display: 'block',
    });
   
    el.after(clone);
    const height = clone.offsetHeight;

    clone.remove();

    return height;
}

function getTimes() {
    let times = [];

    for($i = 0; $i <= 47; $i++) {            
            
        $hour       = Math.floor($i / 2);
        $minute     = ($i % 2 == 0) ? "00" : "30";
        $meridian   = ($hour >= 12) ? "PM" : "AM";

        if ($hour == 0) {
            $hour  = 12;
        } else if ($hour > 12) {
            $hour -= 12;
        }            

        $time = $hour + ":" + $minute;            

        times.push({ 'hour': $hour, 'minute': $minute, 'time': $time, 'meridian': $meridian });
    }

    return times;
}

function getTimesKeyByValue(value) {
    const times = getTimes();

    try {
        const time     = value.split(" ")[0]
        const meridian = value.split(" ")[1]

        for (let i = 0; i < times.length; i++) {
            
            if(times[i].time == time && times[i].meridian == meridian) {                
                return i                    
            }
        }

        return null
    }catch (error) {        
        return null
    }
}

function setLocationInputsToActive(selectedPickup) {
    
    const inputsParent = document.getElementById('location-inputs')
    const inputs       = inputsParent.getElementsByClassName('search-input-set')

    if(selectedPickup) {
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.add('active')
        }
        inputsParent.classList.add('active')
    } else{
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('active')
        }
        inputsParent.classList.remove('active')
    }
}

function moveBulletValueElement(currentValue, rangeInputElement, bulletValueElement) {
    let bulletPosition = (currentValue / rangeInputElement.max)
    const widthInputRange = rangeInputElement.offsetWidth;                              
    let leftPosition = (bulletPosition * (widthInputRange - 80));  //El 80 son los pixels que mide el bolo rosa. Su medida está en .range-input::-webkit-slider-thumb
    
    bulletValueElement.style.left = leftPosition + 'px'
    bulletValueElement.style.transform = 'none'

    
}
document.addEventListener('DOMContentLoaded', () => {    

    function calendarHeight() {
        const calendarLayer = document.getElementById('calendar__layer');
        const calendar = document.getElementById('calendar');

        let calendarLayerHeight = calendarLayer.offsetHeight;

        calendar.style.height = calendarLayerHeight + 'px';        
    }

    if (typeof calendar__layer !== 'undefined')  new ResizeObserver(calendarHeight).observe(calendar__layer);
});
function getSearchBarBoundings() {
    return document.querySelector('#search-bar').getBoundingClientRect();;
}

function getSearchBarPositionTop() {
    return getSearchBarSpaceTop() + getSearchBarScrollTop();
}

function getSearchBarSpaceTop() {
    return getSearchBarBoundings().top;
}

function getSearchBarSpaceBottom() {
    return window.innerHeight - getSearchBarBoundings().bottom;
}

function getSearchBarScrollTop() {
    return window.pageYOffset;
}

function position() {
    const searchbarPopovers = document.querySelectorAll('.searchbar-popover');

    searchbarPopovers.forEach(searchbarPopover => {
        if (getSearchBarPositionTop() < 600) {
            // El calendario no cabe arriba
            searchbarPopover.classList.add('position-top');
            searchbarPopover.classList.remove('position-bottom');
        } else {
            if (getSearchBarSpaceTop() <= getSearchBarSpaceBottom()) {
                // Más espacio abajo
                searchbarPopover.classList.add('position-top');
                searchbarPopover.classList.remove('position-bottom');
            } else {
                searchbarPopover.classList.remove('position-top');
                searchbarPopover.classList.add('position-bottom');
            }
        }
    });
}

window.addEventListener('load', position);
window.addEventListener('scroll', position);
window.addEventListener('resize', position);

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

let vWidth   = window.innerWidth;
let vHeight  = window.innerHeight;

let isMobile = (vWidth <= 767);

/**
 * Fades in an element
 * @param {Object} e element
 * @param {string} durationClass tailwind class for duration
 */
function fadeIn(e, durationClass = 'duration-300') {
    
    addClass(e, 'transition-opacity');

    e.classList.remove(durationClass);
    e.classList.remove('opacity-0');  
    e.classList.add('opacity-100');  
}

/**
 * Fades out an element
 * @param {Object} e element
 * @param {string} durationClass tailwind class for duration
 */
function fadeOut(e, durationClass = 'duration-300') {

    addClass(e, 'transition-opacity');

    e.classList.remove('opacity-100');
    e.classList.add('opacity-0');                        
    e.classList.add(durationClass);
}

/**
 * Add a class to an element checking if the class 
 * @param {object} e element 
 */
function addClass(e, klass) {
    if(!e.classList.contains(klass)){
        e.classList.add(klass);
    }
}

function isHidden(el) {
    if(el) {
        var style = window.getComputedStyle(el);
        return (style.display === 'none')
    }
    
    return false;
}


let scrollTopPosition;

document.addEventListener('DOMContentLoaded', () => {    
    
    if((document.getElementById('calendar-picker') )) {        

        const picker = new easepick.create({            
            element: document.getElementById('calendar-picker'),
            css: [
                '/css/easepick.css',
            ],
            plugins: [RangePlugin],
            calendars: numberCalendar(), //Number of visible months.
            grid: structureCalendar(), //Number of calendar columns.	
            firstDay: 7,
            autoApply: false,
            documentClick:false,
            lang: appLocale(),
            RangePlugin: {
                locale: {
                    one: tooltipText('one'),
                    other: tooltipText('other'),
                },
                startDate: getStartDateFromUrl(),
                endDate: getEndDateFromUrl(),
            },
            locale: {
                previousMonth: '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"><path fill="#000" d="M0.606095 11.9238C0.623254 11.6068 0.754464 11.3054 0.977016 11.0716L11.1508 0.43725C11.4062 0.17139 11.7605 0.0146009 12.1354 0.000967091C12.5104 -0.0126668 12.8757 0.118316 13.1508 0.364699C13.4263 0.611082 13.5888 0.952901 13.6024 1.31469C13.6166 1.67647 13.4808 2.029 13.226 2.29437L3.94388 12.0002L13.226 21.7056C13.4813 21.9714 13.6171 22.3235 13.6024 22.6857C13.5883 23.0475 13.4258 23.3893 13.1508 23.6357C12.8757 23.8821 12.5104 24.0131 12.1354 23.999C11.7605 23.9853 11.4062 23.8285 11.1508 23.5632L0.977016 12.9288C0.717119 12.6561 0.582881 12.2933 0.606095 11.9233V11.9238Z" fill="black"/></svg>',
                nextMonth: '<svg width="14" height="24" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg"> <path fill="#000" d="M13.3011 11.9238C13.284 11.6068 13.1528 11.3054 12.9302 11.0716L2.75639 0.43725C2.50104 0.17139 2.14677 0.0146009 1.77181 0.000967091C1.39685 -0.0126668 1.03148 0.118316 0.756446 0.364699C0.480905 0.611082 0.318407 0.952902 0.304781 1.31469C0.290651 1.67647 0.426404 2.029 0.681254 2.29437L9.96335 12.0002L0.681254 21.7056C0.425899 21.9714 0.290146 22.3235 0.304781 22.6857C0.318912 23.0475 0.48141 23.3893 0.756446 23.6357C1.03148 23.8821 1.39685 24.0131 1.77181 23.999C2.14677 23.9853 2.50104 23.8285 2.75639 23.5632L12.9302 12.9288C13.1901 12.6561 13.3243 12.2933 13.3011 11.9233V11.9238Z" fill="black"/> </svg>',
            },
            
            setup(picker) {  
                picker.on('render', (e) => {       
                    const { date, view } = e.detail;                    

                    const start = picker.getStartDate();
                    const end   = picker.getEndDate();
                    
                    initDates(start, end);
                });           

                picker.on('preselect', (e) => { //Event is called on select days (before submit selection). When autoApply option is false.
                    const { start, end } = e.detail;
                    
                    scrollTopPosition = e.target.querySelector('main').scrollTop;
                                
                    //set dates in order to show them selected when calendar hides/shows
                    if (start) picker.setStartDate(start);
                    if (end)   picker.setEndDate(end);
                    
                    initDates(start, end);            
                }),				
                    
                picker.on('view', (e) => {
                    const { view, date, target } = e.detail;
                    
                    if (view === 'Footer') {
                        footerScroll(e.target);                                         
                    }
                    
                    if (view === 'CalendarDay') {							
                        addDataDayAttribute(date, target); //add the data-day attribute to the days in order to use it as a 'content' in the css ::after selector
                        
                        setDisabledDays(date, target); //disable days before tomorrow
                    }
                    
                    if (view === 'CalendarDayName') {
                        formatCalendarDayName(target) //Format the day name displayed in the header to short it to two characters
                    }
                    
                });            
            },											
        });   
         
    }	
});		

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


const numberCalendar = () => {
    if (isMobile) {
        return 24;
    } else {
        return 2;
    }
}

const structureCalendar = () => {    
    if (isMobile) {
        return 1;
    } else {
        return 2;
    }
}

window.addEventListener('load',   numberCalendar, structureCalendar)
window.addEventListener('resize', numberCalendar, structureCalendar)
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
extraPopup = function () {
    return {
        show: false,

        open: function() {
            this.show = true;
            this.setHtmlOverflowHIdden();
            this.moveToTheTop();
        },                   

        close: function() {
            this.show = false;
            this.setHtmlOverflowHIdden();
        },

        setHtmlOverflowHIdden: function() {
            this.htmlOverflowHidden = this.show;            
        },

        moveToTheTop: function() {
            window.scrollTo(0, 0);
        },

        visibility: function() {
            return this.show;
        }
    };
}

extraPrice = function () {
    return {
        selected: false,

        toggle: function() {
            this.selected = !this.selected
        },                   
    };
}

initSwiper = function (selector, params) {
    const swiperEl = document.querySelector(selector);

    // now we need to assign all parameters to Swiper element
    Object.assign(swiperEl, params);

    // and now initialize it
    swiperEl.initialize();
}   
locationInputs = function (config) {
    return {
        
        startLocation: null,

        endLocation: null,          

        locations: null,

        pickupLocationFromUrl: null,

        returnLocationFromUrl: null,

        init: function() {
            this.locations = JSON.parse(config.locations)

            this.setLocationsFromUrl()
        },

        setLocationsFromUrl: function() {
            this.pickupLocationFromUrl = carSearchUrlParams.startLocation;

            this.returnLocationFromUrl = carSearchUrlParams.endLocation; 

            this.setLocations()

            this.setInputsActive()
        },

        setInputsActive: function() {
            setLocationInputsToActive(this.startLocation)   
        },

        setLocations: function() {
            if(this.pickupLocationFromUrl){
                if(this.validateLocation(this.pickupLocationFromUrl)) {
                    this.startLocation = this.pickupLocationFromUrl
                }
            } 

            if(this.returnLocationFromUrl){
                if(this.validateLocation(this.returnLocationFromUrl)) {
                    this.endLocation = this.returnLocationFromUrl
                }
            } 
        },

        validateLocation: function(name) {
            for (let location in this.locations) {
                if (this.locations[location] == name) {
                    return true
                }
            }
           return false
        }
    };
}

document.addEventListener('DOMContentLoaded', () => {   
    // Transition on toggle change
    function locationsHeight() {
        const locationsLayer = document.getElementById('return__layer');
        const locations = document.getElementById('select-return-location');

        let locationsLayerHeight = locationsLayer.offsetHeight;

        locations.style.height = locationsLayerHeight + 'px';
    }

    if (typeof return__layer !== 'undefined') new ResizeObserver(locationsHeight).observe(return__layer);
});
function locationsSelector(config) {

    return {
        
        selectedLocations: {'pickup': null, 'dropoff': null},  
        
        pickupInput: null,

        dropoffInput: null,

        init : function() {
            this.sameLocation = config.sameLocation,
            this.locations    = JSON.parse(config.locations)

            this.pickupInput  = document.getElementById('pickup-location')
            this.dropoffInput = document.getElementById('return-location')       
            
        },

        toggleLocations: function () {      

            this.sameLocation = !this.sameLocation      
            
            if(this.sameLocation) this.equalizeLocations()
            
        },

        locationSelected: function(type, location) {            
            this.selectedLocations[type] = location;

            if (this.sameLocation && type == 'pickup') {
                this.selectedLocations['dropoff'] = location;    
            } 

            if(this.selectedLocations['dropoff'] == null ) this.equalizeLocations() //it happens when first time toggleLocations is clicked
            
            this.setValuesToInputs()

            this.setInputsActive()
        },

        equalizeLocations: function() {
            this.selectedLocations['dropoff'] = this.selectedLocations['pickup'];

            this.setValuesToInputs()
        },

        setValuesToInputs: function() {                    
            this.pickupInput.value  = this.locations[this.selectedLocations['pickup']]
            this.dropoffInput.value = this.locations[this.selectedLocations['dropoff']]            
        },

        setInputsActive: function() {

            setLocationInputsToActive(this.selectedLocations['pickup'])            
            
        }        
    }
}
function mobileInputs(config) {    

    return {
        startTime: '12:00 AM',

        endTime: '12:00 AM',

        startHour: '12:00',
        
        startMeridian: 'AM',

        endHour: '12:00',
        
        endMeridian: 'AM',

        locations: [],

        startLocation: 'Kef Int',

        endLocation: 'Kef Int',

        init: function() {

            this.setConfig()            
            
            this.setTimes()

            this.setHoursAndMeridians()

            this.setLocations()
            
        },       

        setConfig() {
            this.locations = JSON.parse(config.locations)
        },
        
        setTimes: function() {
            const urlStartTime = carSearchUrlParams.startTime; 
            const urlEndTime   = carSearchUrlParams.endTime;   

            if(getTimesKeyByValue(urlStartTime) != null) this.startTime = urlStartTime

            if(getTimesKeyByValue(urlEndTime)   != null) this.endTime   = urlEndTime
        },

        setHoursAndMeridians: function() {
            this.startHour = this.startTime.split(" ")[0]
            this.endHour   = this.endTime.split(" ")[0]

            this.startMeridian = this.startTime.split(" ")[1]
            this.endMeridian   = this.endTime.split(" ")[1]
        },

        setLocations: function() {
            const urlPickupLocation = carSearchUrlParams.startLocation; 
            const urlReturnLocation = carSearchUrlParams.endLocation; 
            
            if(this.validateLocation(urlPickupLocation)) this.startLocation = urlPickupLocation

            if(this.validateLocation(urlReturnLocation)) this.endLocation = urlReturnLocation
            
        },

        validateLocation: function(name) {
            for (let location in this.locations) {
                if (this.locations[location] == name) {
                    return true
                }
            }
           return false
        }
    }
}

navBar = function () {
    return {
        show: false,

        lastScrollPos: 0, 

        navbarHeight: 76,
        
        scrolledUp: false,     
        
        atTop: false, 

        disableTransition: false,        

        init: function() {
            
            this.setAtTop();

            this.scrollEvent();
        },

        scrollEvent: function() {
            window.addEventListener('scroll', () => { 
                
                this.disableTransition = false;
                
                this.scrollDetection();
                
                this.setAtTop();                                
            });
        },

        scrollDetection: function() {    
            let scrollY = this.getScrollY();
            
            this.scrolledUp     = scrollY < this.lastScrollPos;
            this.lastScrollPos  = scrollY;            
        },

        //when scrolling down, navbar disappears so the lastScrollPos won't work when comparing to the scrollY unless we substract the navbar height. 
        //If we don't do it, an infinity loop will fire when the user scrolls down
        getScrollY: function() {
            let scrollY = window.scrollY;

            if(isHidden(this.$refs.navbar)) {
                scrollY += this.navbarHeight; 
            }

            return scrollY;
        },

        close: function() {
            this.show = false
        },

        open: function() {
            this.show = true
        },

        toggle: function() {
            this.show = !this.show
        },
        
        visibility: function() {
            return this.show
        },

        navbarVisibility: function() {
            return (this.atTop || this.scrolledUp) && (!this.disableTransition);
        },

        clickAway: function() {                        
            if(!isMobile) this.disableTransition = !this.atTop;            
        },

        setAtTop: function() {
            this.atTop = (window.scrollY === 0);
        },

        scrollingUp: function() {
            return this.scrolledUp && !this.disableTransition && !this.atTop;
        }
    };
}

paymentProcessing = function () {
    return {        
        
        init: function() {
            this.scrollToPaymentProcessing();
        },                   

        scrollToPaymentProcessing: function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });        
        },        
    };
}


/**
 * Manages the plus-minus-input
 * Optional params for config:
 *  int minimum  -> minimum number accepted
 *  int maximum  -> maximum number accepted
 *  int starting -> number where the input will start
 *  string livewireListener -> the livewire listener to update the number. Default 'update_number'
 */

plusMinusInput = function (config) {
    return {

        number: 0,

        minimum: 0,

        maximum: 12,

        starting: 0,

        minusDisabled: true,
        
        plusDisabled: false,

        livewireListener: 'update_number',

        init: function() {
            
            this.init_config();
            
            this.number = this.starting;
            
            this.buttons_visibility();
        },

        plus: function() {                    
            if(this.number < this.maximum) {    
                this.number++;                
                this.update_number_in_livewire();
            } 

            this.buttons_visibility();
        },                   

        minus: function() {
            if(this.number > this.minimum) {
                this.number--;               
                this.update_number_in_livewire();
            }     
            
            this.buttons_visibility();
        },

        init_config() {

            if (config !== undefined && config.minimum !== undefined) {  
                this.minimum = config.minimum;                
            }

            if (config !== undefined && config.starting !== undefined) {  
                this.starting = config.starting;                            
            }

            if (config !== undefined && config.livewireListener !== undefined) {  
                this.livewireListener = config.livewireListener;                            
            }

            if (config !== undefined && config.maximum !== undefined) {  
                this.maximum = config.maximum;                            
            }

        },

        buttons_visibility() {
            this.minus_visibility();
            this.plus_visibility();
        },

        minus_visibility() {            
            this.minusDisabled = (this.number <= this.minimum);                                     
        },

        plus_visibility() {            
            this.plusDisabled = (this.number >= this.maximum);                                     
        },

        /**
         * Calls the livewire listener in order to update the number value in livewire
         */
        update_number_in_livewire() {
            Livewire.emit(this.livewireListener, this.number);
        }
    };
}


//comments for this in reviews-info-widget component
reviewsInfoWidget = function(config) {
    return {

        schema: null,

        reviewCount: 0,        

        badgeContainer: null,

        reviewsElement: null,            
        
        reviewsText: config.reviewsText,

        reviewsClasses: config.reviewsClasses,

        flexGapClass: config.flexGapClass,

        showWidget: false,
        
        init: function() {                                   
            this.loadWidget()  //wait for the widget to be loaded          
        },

        widgetLoaded: function() {                                           
            this.setElements();                                    

            this.setReviews();

            this.setFlex();

            this.showWidget = true;
        },

        visibility: function() {
            return this.showWidget
        },

        setElements: function() {
            this.reviewsElement   = this.$refs.widget.querySelector('[class^="BadgeTotalReviews"]')
            this.badgeContainer = this.$refs.widget.querySelector('[class^="BadgeContainer"]')                
        },

        setFlex: function() {
            this.badgeContainer.classList.add(this.flexGapClass)
        },

        setReviews: function() {
            this.reviewCount = this.schema.aggregateRating.reviewCount;
            this.reviewsElement.innerText = this.reviewCount + ' '+ this.reviewsText;
            this.reviewsElement.className = this.reviewsClasses;
        },

        loadWidget: function() {

            const fullWidgetInterval = setInterval(() => {

                let fullWidget = this.$refs.widget.querySelector('[data-app^="eapps"]');

                if(fullWidget) {
                    
                    clearInterval(fullWidgetInterval);

                    const schemaInterval = setInterval(() => {

                        let scriptElement = fullWidget.querySelector('script[type="application/ld+json"]');

                        if(scriptElement) {
                           
                            clearInterval(schemaInterval);

                            const jsonContent = scriptElement.textContent || scriptElement.innerText;

                            this.schema = JSON.parse(jsonContent);
                            
                            this.widgetLoaded();
                                                                                   
                        }
                                           
                    }, 500);                    
                }
            }, 500);
        }
    }
}


selectable = function(config) {
    return {
        data: config.data,    
        
        openDropdown: false,
        
        options: {},    

        value: config.value,            

        focusedOptionIndex: null,

        init: function () {
            this.options = this.data

            if (!(this.value in this.options)) this.value = null     
            
            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)                    
        },

        selectOption: function () {
            if (!this.openDropdown) return this.toggleListboxVisibility()

            this.value = Object.keys(this.options)[this.focusedOptionIndex]   
            
            this.$refs.inputSelectedValue.value = this.value
            
            this.showOption()

            this.closeListbox()                
        },    

        showOption: function() {
            this.$refs.showSelectedOption.innerHTML = Object.values(this.options)[this.focusedOptionIndex];
        },                    
        
        toggleListboxVisibility: function () {     
                    
            if (this.openDropdown) return this.closeListbox()

            this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)

            if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0

            this.openDropdown = true
            
            this.$nextTick(() => {                    
                this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
                    block: "center"
                })
            })
        },

        closeListbox: function () {
            this.openDropdown = false

            this.focusedOptionIndex = null
        },
    }
}  
selectableFull = function(config) {
    return {
        show: false,

        value: config.value,

        title: config.title,

        selectedTitle: config.title,

        allValue: config.allValue,

        isSelected: false,

        clickItem: function(selectableFullItem) {                   
            this.value = selectableFullItem.value
            this.selectedTitle = (this.value == this.allValue) ? this.title : selectableFullItem.text            
            this.toggleVisibility()   
            this.setIsSelected()               
        },

        toggleVisibility: function() {
            this.show = !this.show
        },

        clickAway: function() {
            this.show = false
        },

        setIsSelected: function() {                        
            this.isSelected = (this.value != this.allValue)
        }
        
    }
}
selectOption = function (config) {
    return {
        selectedOption: config.selectedOption,

        select(option) {            
            this.selectedOption = option
        },                
    };
}

function timePicker(config) {
    return {

        times:[],

        time: '12:00',

        meridian: 'AM',

        inputElementSelector: '',

        inputElement: null,

        currentValue: 24,

        timeFromUrl: null,

        init() {            
        
            this.setTimes()
            
            this.setInputElement()          
            
            this.setTimeFromUrl()

            this.$nextTick(() => { 
                
                if(this.timeFromUrl) {
                    const timesKey = getTimesKeyByValue(this.timeFromUrl);
    
                    if(timesKey) this.changeValue(timesKey)
                }

            })     
    
        },              

        changeValue: function(value) {     
            
            this.currentValue = value

            this.setValues()

            this.setInput()           

            this.moveBulletValueElement()
        },

        setValues() {
            let time = this.times[this.currentValue];
            
            this.time     = time.time
            this.meridian = time.meridian            
        },

        setInput() {

            this.inputElement.value = this.time + ' ' + this.meridian

            this.inputElement.parentElement.classList.add('active');
            this.inputElement.parentElement.parentElement.classList.add('active');

        },

        moveBulletValueElement() {            
            moveBulletValueElement(this.currentValue, this.$refs.rangeinput,this.$refs.bulletValueElement);                       
        },        

        setTimes() {

            this.times = getTimes()            

        },

        setInputElement() {

            this.inputElement = document.querySelector(config.inputElementSelector)

        },

        setTimeFromUrl() {
           
            this.timeFromUrl = carSearchUrlParams[config.urlElementParam] 

        }
    }
};


visibilitySelector = function () {
    return {
        show: false,

        close: function() {
            this.show = false
        },

        open: function() {
            this.show = true
        },

        toggle: function() {
            this.show = !this.show
        },
        
        visibility: function() {
            return this.show
        }
    };
}
