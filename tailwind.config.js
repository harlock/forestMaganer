const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    mode: "jit",
    plugins: [require("@tailwindcss/forms")],

    content: [
        "./resources/**/*.blade.php",
        "./resources/views/livewire/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    }[(require("@tailwindcss/forms"), require("@tailwindcss/typography"))],
};
