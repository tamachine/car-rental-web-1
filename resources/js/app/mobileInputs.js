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
