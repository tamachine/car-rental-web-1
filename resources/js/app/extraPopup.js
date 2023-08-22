extraPopup = function () {
    return {
        show: false,

        open: function() {
            this.show = true;
            this.setHtmlOverflowHIdden();
            this.moveToTheTop();
        },                   

        close: function() {
            this.show = false;
            this.setHtmlOverflowHIdden();
        },

        setHtmlOverflowHIdden: function() {
            this.htmlOverflowHidden = this.show;            
        },

        moveToTheTop: function() {
            window.scrollTo(0, 0);
        },

        visibility: function() {
            return this.show;
        }
    };
}
