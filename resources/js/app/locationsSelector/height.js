document.addEventListener('DOMContentLoaded', () => {   
    // Transition on toggle change
    function locationsHeight() {
        const locationsLayer = document.getElementById('return__layer');
        const locations = document.getElementById('select-return-location');

        let locationsLayerHeight = locationsLayer.offsetHeight;

        locations.style.height = locationsLayerHeight + 'px';
    }

    if (typeof return__layer !== 'undefined') new ResizeObserver(locationsHeight).observe(return__layer);
});