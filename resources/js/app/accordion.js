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