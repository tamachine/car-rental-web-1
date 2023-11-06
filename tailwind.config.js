/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    safelist: [
        'bg-[#AA78A6]',
        'bg-[#F5CB5C]',
        'bg-[#AECBEB]',
        'bg-[#B4D6D3]',
        'bg-[#8E9AAF]',

        'bg-[#EEF8FD]', 'hover:bg-[#d1ecfa]',
        'bg-[#EEFDF0]', 'hover:bg-[#d1fad7]',
        'bg-[#FDEEF4]', 'hover:bg-[#fad1e1]',
        'bg-[#F9EEFD]', 'hover:bg-[#efd1fa]',
        'bg-[#EEFDFD]', 'hover:bg-[#d1fafa]',
        'bg-[#FDFCEE]', 'hover:bg-[#faf7d1]',
    ],
    theme: {
        extend: {

            backgroundImage: {
                'home-hero': "url('/images/home/hero.png')",
                'home-hero-mobile': "linear-gradient(180deg, #FFFFFF 8.65%, rgba(255, 255, 255, 0) 30%), url('/images/home/hero.png')",
                'footer-image-pattern': 'linear-gradient(0deg, rgba(7,0,0,1) 6%, rgba(121,9,9,0) 35%, rgba(255,255,255,1) 100%)',
                'footer-image-pattern-mobile': 'linear-gradient(0deg, rgba(7,0,0,1) 6%, rgba(121,9,9,0) 35%, rgba(255,255,255,1) 70%)',
                'calendar-selected-pattern' : 'linear-gradient(to right, white 20%, #E11166 20%, #E11166 40%, #E11166 40%, #E11166 60%, #E11166 60%, #E11166 80%, white 80%, white 100%)',
                'cars-image-pattern': 'linear-gradient(to bottom, rgba(252,252,252,1) 0%,rgba(255,255,255,1) 20%,rgba(255,255,255,0) 100%)',
                'cars-image-pattern-mobile': 'linear-gradient(to bottom, rgba(252,252,252,1) 0%,rgba(255,255,255,1) 10%,rgba(255,255,255,0) 100%)'
            },
            borderRadius: {
                '2lg': '10px',
            },
            boxShadow: {
                't-xl': '1px 1px 54px -30px rgba(0,0,0,0.3),1px 1px 54px -30px rgba(0,0,0,0.3)',
                't-md': '0px -2px 10px 1px rgba(0, 0, 0, 0.15)',
            },
            colors: {
                'black-primary': '#300000',
                'black-secondary': '#3B3E44',
                'black-not-deep': '#14272C',
                'gray-primary' : '#F4F5F7',
                'gray-secondary' : '#E7ECF3',
                'gray-tertiary' : '#B1B5C4',
                'gray-light' : '#AAAAAA',
                'gray-bg-cars' : '#FCFCFC',
                'pink-red':'#E11166',
                'pink-red-secondary' : '#FDEEF4',
                'pink-red-medium' : '#D31060',
                'yellow-ci': '#F6BD00',
                'black-ci' : '#161616',
            },
            fontFamily: {
                sans: ['DMSansRegular', ...defaultTheme.fontFamily.sans],
                'sans-bold': ['DMSansBold'],
                'sans-bold-italic': ['DMSansBoldItalic'],
                'sans-italic': ['DMSansItalic'],
                'sans-medium': ['DMSansMedium'],
                'sans-medium-italic': ['DMSansMediumItalic'],
                fredoka: ['FredokaRegular'],
                'fredoka-bold': ['FredokaBold'],
                'fredoka-Light': ['FredokaLight'],
                'fredoka-medium': ['FredokaMedium'],
                'fredoka-semibold': ['FredokaSemiBold'],
                fredokaOne: ['FredokaOne'],
                'cabin-semibold': ['CabinSemiBold'],
            },
            maxWidth: {
                '6xl': '1170px',
                '7xl': '1440px',
            },
            lineHeight: {
                'mini': '0.85',
                'extra-loose': '1.8',
            },
            padding: {
                '22' : "84px",
            },
            borderRadius: {
                '3xl' : "20px",
            },
            screens: { //Breakpoints
                '2sm': '410px', // => @media (min-width: 410px) { ... }
                'md-max': {'max': '767px'}, // => @media (max-width: 767px) { ... }
                '7xl': '1440px'
            },
            transitionProperty: {
                'height': 'height'
            },
            width: {
                '6xl': '1170px',
                'screen': '100dvw',
            },
            height: {
                'screen': '100dvh',
            },
            dropShadow: {
                'text': '0 6px 20px rgba(0, 0, 0, 0.4)',
            },
            maxWidth: {
                '10xl': '1800px',
            },

            spacing: {
                'revert': 'revert',
            },

            listStyleType: {
                'revert': 'revert',
              },
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        //require('@tailwindcss/typography'),
        //require('@tailwindcss/line-clamp'),
        //require('tw-elements/dist/plugin')
    ],
};

