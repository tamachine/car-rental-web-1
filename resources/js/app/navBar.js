navBar = function () {
    return {
        show: false,

        lastScrollPos: 0, 

        navbarHeight: 76,
        
        scrolledUp: false,     
        
        atTop: false, 

        disableTransition: false,        

        init: function() {
            
            this.setAtTop();

            this.scrollEvent();
        },

        scrollEvent: function() {
            window.addEventListener('scroll', () => { 
                
                this.disableTransition = false;
                
                this.scrollDetection();
                
                this.setAtTop();                                
            });
        },

        scrollDetection: function() {    
            let scrollY = this.getScrollY();
            
            this.scrolledUp     = scrollY < this.lastScrollPos;
            this.lastScrollPos  = scrollY;            
        },

        //when scrolling down, navbar disappears so the lastScrollPos won't work when comparing to the scrollY unless we substract the navbar height. 
        //If we don't do it, an infinity loop will fire when the user scrolls down
        getScrollY: function() {
            let scrollY = window.scrollY;

            if(isHidden(this.$refs.navbar)) {
                scrollY += this.navbarHeight; 
            }

            return scrollY;
        },

        close: function() {
            this.show = false
        },

        open: function() {
            this.show = true
        },

        toggle: function() {
            this.show = !this.show
        },
        
        visibility: function() {
            return this.show
        },

        navbarVisibility: function() {
            return (this.atTop || this.scrolledUp) && (!this.disableTransition);
        },

        clickAway: function() {                        
            if(!isMobile) this.disableTransition = !this.atTop;            
        },

        setAtTop: function() {
            this.atTop = (window.scrollY === 0);
        },

        scrollingUp: function() {
            return this.scrolledUp && !this.disableTransition && !this.atTop;
        }
    };
}
