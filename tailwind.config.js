const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Pirata One', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                red:{
                    600: "#BF2806"
                },
                blue:{
                    900: "#323F59"
                },
                amber:{
                    900: "#efe5cc",
                    950: "#e8cc94"
                },
                neutral:{
                    900: "#842907"
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
