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
                // Siniguradong Poppins ang main font
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Dito naka-fix ang branding colors mo
                'dost-blue': '#17385B',    // Dark Blue para sa Navbar/Sidebar
                'dost-cyan': '#00AEEF',    // Bright Cyan para sa Table Headers/Buttons
                'dost-hover': '#E9F5FA',   // Light Blue para sa Hover effects sa table/links
            },
        },
    },

    plugins: [forms],
};