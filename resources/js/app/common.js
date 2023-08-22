let vWidth   = window.innerWidth;
let vHeight  = window.innerHeight;

let isMobile = (vWidth <= 767);

/**
 * Fades in an element
 * @param {Object} e element
 * @param {string} durationClass tailwind class for duration
 */
function fadeIn(e, durationClass = 'duration-300') {
    
    addClass(e, 'transition-opacity');

    e.classList.remove(durationClass);
    e.classList.remove('opacity-0');  
    e.classList.add('opacity-100');  
}

/**
 * Fades out an element
 * @param {Object} e element
 * @param {string} durationClass tailwind class for duration
 */
function fadeOut(e, durationClass = 'duration-300') {

    addClass(e, 'transition-opacity');

    e.classList.remove('opacity-100');
    e.classList.add('opacity-0');                        
    e.classList.add(durationClass);
}

/**
 * Add a class to an element checking if the class 
 * @param {object} e element 
 */
function addClass(e, klass) {
    if(!e.classList.contains(klass)){
        e.classList.add(klass);
    }
}

function isHidden(el) {
    if(el) {
        var style = window.getComputedStyle(el);
        return (style.display === 'none')
    }
    
    return false;
}

