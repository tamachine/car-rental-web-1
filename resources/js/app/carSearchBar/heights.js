document.addEventListener('DOMContentLoaded', () => {    

    function calendarHeight() {
        const calendarLayer = document.getElementById('calendar__layer');
        const calendar = document.getElementById('calendar');

        let calendarLayerHeight = calendarLayer.offsetHeight;

        calendar.style.height = calendarLayerHeight + 'px';        
    }

    if (typeof calendar__layer !== 'undefined')  new ResizeObserver(calendarHeight).observe(calendar__layer);
});