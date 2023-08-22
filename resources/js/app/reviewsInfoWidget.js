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

