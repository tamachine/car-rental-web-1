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
