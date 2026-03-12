import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dost-blue': '#17385B',
                'dost-cyan': '#00AEEF',  
                'dost-hover': '#E9F5FA', 
                'dost-light' : '#E9F5FA',
                'layout-color' : '#F4F4F5',
                'text-color' : '#858282',
            },
        },
    },

    plugins: [forms],
};