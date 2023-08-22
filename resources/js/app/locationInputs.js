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
