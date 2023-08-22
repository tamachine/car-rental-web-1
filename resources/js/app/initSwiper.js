initSwiper = function (selector, params) {
    const swiperEl = document.querySelector(selector);

    // now we need to assign all parameters to Swiper element
    Object.assign(swiperEl, params);

    // and now initialize it
    swiperEl.initialize();
}   