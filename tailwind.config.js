import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#2563eb',
                secondary: '#64748b',
                dark: '#0f172a',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'gradient-move': 'gradientMove 15s ease infinite',
                'slide-in-left': 'slideInFromLeft 0.8s ease-out',
                'slide-in-right': 'slideInFromRight 0.8s ease-out',
                'fade-in-up': 'fadeInUp 0.8s ease-out',
                'scale-in': 'scaleIn 0.8s ease-out',
                'typewriter': 'typewriter 3s steps(40, end)',
                'blink-cursor': 'blinkCursor 1s infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0px)' },
                    '50%': { transform: 'translateY(-20px)' },
                },
                gradientMove: {
                    '0%': { backgroundPosition: '0% 50%' },
                    '50%': { backgroundPosition: '100% 50%' },
                    '100%': { backgroundPosition: '0% 50%' },
                },
                slideInFromLeft: {
                    '0%': {
                        transform: 'translateX(-100%)',
                        opacity: '0',
                    },
                    '100%': {
                        transform: 'translateX(0)',
                        opacity: '1',
                    },
                },
                slideInFromRight: {
                    '0%': {
                        transform: 'translateX(100%)',
                        opacity: '0',
                    },
                    '100%': {
                        transform: 'translateX(0)',
                        opacity: '1',
                    },
                },
                fadeInUp: {
                    '0%': {
                        transform: 'translateY(30px)',
                        opacity: '0',
                    },
                    '100%': {
                        transform: 'translateY(0)',
                        opacity: '1',
                    },
                },
                scaleIn: {
                    '0%': {
                        transform: 'scale(0)',
                        opacity: '0',
                    },
                    '100%': {
                        transform: 'scale(1)',
                        opacity: '1',
                    },
                },
                typewriter: {
                    'from': { width: '0' },
                    'to': { width: '100%' },
                },
                blinkCursor: {
                    'from, to': { borderColor: 'transparent' },
                    '50%': { borderColor: '#2563eb' },
                },
            },
        },
    },

    plugins: [forms],
};
