function getSearchBarBoundings() {
    return document.querySelector('#search-bar').getBoundingClientRect();;
}

function getSearchBarPositionTop() {
    return getSearchBarSpaceTop() + getSearchBarScrollTop();
}

function getSearchBarSpaceTop() {
    return getSearchBarBoundings().top;
}

function getSearchBarSpaceBottom() {
    return window.innerHeight - getSearchBarBoundings().bottom;
}

function getSearchBarScrollTop() {
    return window.pageYOffset;
}

function position() {
    const searchbarPopovers = document.querySelectorAll('.searchbar-popover');

    searchbarPopovers.forEach(searchbarPopover => {
        if (getSearchBarPositionTop() < 600) {
            // El calendario no cabe arriba
            searchbarPopover.classList.add('position-top');
            searchbarPopover.classList.remove('position-bottom');
        } else {
            if (getSearchBarSpaceTop() <= getSearchBarSpaceBottom()) {
                // Más espacio abajo
                searchbarPopover.classList.add('position-top');
                searchbarPopover.classList.remove('position-bottom');
            } else {
                searchbarPopover.classList.remove('position-top');
                searchbarPopover.classList.add('position-bottom');
            }
        }
    });
}

window.addEventListener('load', position);
window.addEventListener('scroll', position);
window.addEventListener('resize', position);
