const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    colors: {
        green: {
            '100': '#F0FFF4',
            '200': '#C6F6D5',
            '300': '#9AE6B4',
            '400': '#68D391',
            '500': '#48BB78',
            '600': '#38A169',
            '700': '#2F855A',
            '800': '#276749',
            '900': '#22543D',
        },
        red: {
            '50': '#fdf2f2',
            '100': '#fde8e8',
            '200': '#fbd5d5',
            '300': '#f8b4b4',
            '400': '#f98080',
            '500': '#f05252',
            '600': '#e02424',
            '700': '#c81e1e',
            '800': '#9b1c1c',
            '900': '#771d1d',
        },
        blue: {
            '100': '#ebf8ff',
            '200': '#bee3f8',
            '300': '#90cdf4',
            '400': '#63b3ed',
            '500': '#4299e1',
            '600': '#3182ce',
            '700': '#2b6cb0',
            '800': '#2c5282',
            '900': '#2a4365',
        },

    },

    plugins: [require('@tailwindcss/forms')],
};
