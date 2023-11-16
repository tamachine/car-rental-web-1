/**
 * Manages the plus-minus-input
 * Optional params for config:
 *  int minimum  -> minimum number accepted
 *  int maximum  -> maximum number accepted
 *  int starting -> number where the input will start
 *  string livewireListener -> the livewire listener to update the number. Default 'update_number'
 *  string livewireListenerParams -> if the livewire listener needs more params than the number, set them here
 *  string spinnerId -> if the livewire listener needs to fire a loading element. This is the id of the element o be hidden/shown
 *  string livewireNumberElementId -> if the number is shown outside the component, the content of livewireNumberElementId element will be replaced by the number
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

        livewireListenerParams: null,

        spinnerId: null,

        updateTimeout: null,

        livewireNumberElementId: null,

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

            this.updateLivewireElement();
        },                   

        minus: function() {
            if(this.number > this.minimum) {
                this.number--;               
                this.update_number_in_livewire();
            }     
            
            this.buttons_visibility();

            this.updateLivewireElement();
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

            if (config !== undefined && config.livewireListenerParams !== undefined) {  
                this.livewireListenerParams = config.livewireListenerParams;                            
            }

            if (config !== undefined && config.spinnerId !== undefined) {  
                this.spinnerId = config.spinnerId;                            
            }

            if (config !== undefined && config.livewireNumberElementId !== undefined) {  
                this.livewireNumberElementId = config.livewireNumberElementId;                            
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
                        
            //clear the updating in order to debounce the livewire method until the last users click
            clearTimeout(this.updateTimeout);
            
            //debounce the call to the livewire listener
            this.updateTimeout = setTimeout(() => {

                this.show_spinner();
                
                if(this.livewireListenerParams) {
                    Livewire.emit(this.livewireListener, this.number, this.livewireListenerParams);
                } else {
                    Livewire.emit(this.livewireListener, this.number);
                }

            }, 500); //5 miliseconds after the last user click                   
        },
        
        /**
         * Show the corresponding spinner element
         */
        show_spinner() {
            if(this.spinnerId) {            
                window.dispatchEvent(new CustomEvent('startLoading', { 
                    detail: { spinnerId: this.spinnerId } 
                }));
            }
        },

        /**
         * when the number is hidden, sometimes it is shown outside the component somewhere else. This method update this.livewireNumberElementId element with the current number
         */
        updateLivewireElement() {
            if(this.livewireNumberElementId) {
                document.getElementById(this.livewireNumberElementId).innerHTML = this.number;
            }
        }
    };
}


