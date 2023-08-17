/** @type {import('tailwindcss').Config} */

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
    theme: {
        extend: {},
    },
    plugins: [],
}

