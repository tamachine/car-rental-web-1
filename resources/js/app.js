import Alpine from 'alpinejs'
import intersect from '@alpinejs/intersect'
window.Alpine = Alpine
Alpine.plugin(intersect)
Alpine.start()

require('@fortawesome/fontawesome-free/js/all.min.js');

import { easepick, RangePlugin, TimePlugin } from '@easepick/bundle';
window.easepick = easepick;
window.RangePlugin = RangePlugin;
window.TimePlugin = TimePlugin;

import { Loader } from '@googlemaps/js-api-loader';
window.loader = new Loader({ /* https://googlemaps.github.io/js-api-loader/interfaces/LoaderOptions.html */
    apiKey: "AIzaSyDOJeKapn-5psUDAdol_nbnywoLWI6kYyw",
    version: "weekly",
    libraries: ["places"]
});

function goToError() {
    let errorDiv = document.getElementsByClassName('validation-error')[0];
    if(errorDiv){
        errorDiv.scrollIntoView({behavior: 'smooth', block: 'center', inline: 'nearest'});
    }
}

window.addEventListener('goToTop', event => {
    window.scrollTo(0, 0);
});

window.addEventListener('goToTop', event => {
    window.scrollTo(0, 0);
});

window.appLocale = function() {    
    return document.getElementById('app_locale').value;
}
