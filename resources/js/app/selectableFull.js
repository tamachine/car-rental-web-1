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