blogPagination = function () {
    return {

        hidePagination: true,

        init: function () {      

            this.scrolling();                 
            
        },

        paginationVisibility: function() {   

            return !this.hidePagination;    

        },

        scrolling: function() {       
              
            let parent = this.$refs.paginationParent;

            let prevElement = this.$refs.prevElement;

            let nextElement = this.$refs.nextElement;

            if(prevElement) {
                
                this.setHidePagination(this.$refs.prevElement, parent);

            } else if(nextElement) {
                
                this.setHidePagination(this.$refs.nextElement, parent);

            }                        
        },

        setHidePagination: function(el, parent) {
            
            let parentBottom = parent.getBoundingClientRect().top + parent.offsetHeight;            
        
            let elBottom = (el.offsetTop + (el.offsetHeight / 2));  
            
            this.hidePagination = (parentBottom < elBottom);     

        }
        
    };
}


