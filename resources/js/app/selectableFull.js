selectableFull = function(config) {
    return {
        show: false,

        value: config.value,

        title: config.title,

        selectedTitle: config.title,

        allValue: config.allValue,

        isSelected: false,

        selectedValue: config.selectedValue,

        clickItemOnFullMode: function(selectableFullItem) {                                          
            this.value = selectableFullItem.value
            this.selectedValue = this.value
            this.selectedTitle = (this.value == this.allValue) ? this.title : selectableFullItem.text                         
            this.toggleVisibility()   
            this.setIsSelected()                                          
        },

        clickItemOnSimpleMode: function(selectableFullItem) {                             
            window.location.href = selectableFullItem.value                                                 
        },

        open: function() {
            this.show = true            
        },

        close: function() {
            this.show = false
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