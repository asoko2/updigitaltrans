const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        fontFamily: {
            nunito: ["Nunito", "sans-serif"],
            poppins: ["Poppins", "sans-serif"],
            inter: ["Inter", "sans-serif"],
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: "#46f200",
                    yellow: "#ccff33",
                    contrast: "#e73b14",
                    "contrast-hover": "#a8290f",
                    bg: "#343a40",
                    white: "#f4f4f4",
                    admin: "#0e0b2b",
                    "admin-hover": "#312693",
                },
            },
            scale: {
                25: "0.25",
            },
            height: {
                "1/12": "8.333333%",
                "2/12": "16.666667%",
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
        function ({ addVariant }) {
            addVariant("child", "& > *");
            addVariant("child-hover", "& > *:hover");
        },
    ],
};
