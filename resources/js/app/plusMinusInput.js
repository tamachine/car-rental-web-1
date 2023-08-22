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

