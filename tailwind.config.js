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
            keyframes: {
                fadeBackground: {
                '0%': { backgroundColor: 'rgba(34, 197, 94, 0.3)' }, // verde claro (success)
                '100%': { backgroundColor: 'transparent' },
                },
            },
            animation: {
                fadeBackground: 'fadeBackground 2s ease-out forwards',
            },
        },
    },
  

    plugins: [forms],
};
