import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
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
            animation: {
                'fade-in': 'fadeIn 1s ease-out',
                'slide-in-left': 'slideInLeft 1s ease-out',
                'slide-in-right': 'slideInRight 1s ease-out',
                'zoom-in': 'zoomIn 0.6s ease-out',
                'fade-left': 'fadeLeft 1s ease-out',
                'fade-right': 'fadeRight 1s ease-out',
                'bounce-slow': 'bounce 3s infinite',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: 0 },
                    '100%': { opacity: 1 },
                },
                slideInLeft: {
                    '0%': { transform: 'translateX(-50px)', opacity: 0 },
                    '100%': { transform: 'translateX(0)', opacity: 1 },
                },
                slideInRight: {
                    '0%': { transform: 'translateX(50px)', opacity: 0 },
                    '100%': { transform: 'translateX(0)', opacity: 1 },
                },
                zoomIn: {
                    '0%': { transform: 'scale(0.95)', opacity: 0 },
                    '100%': { transform: 'scale(1)', opacity: 1 },
                },
                fadeLeft: {
                    '0%': { opacity: 0, transform: 'translateX(-40px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
                fadeRight: {
                    '0%': { opacity: 0, transform: 'translateX(40px)' },
                    '100%': { opacity: 1, transform: 'translateX(0)' },
                },
            },
        },
    },

    plugins: [forms],
};
