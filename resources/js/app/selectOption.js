selectOption = function (config) {
    return {
        selectedOption: config.selectedOption,

        select(option) {            
            this.selectedOption = option
        },                
    };
}
