module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {
            boxShadow: {
                'inner-lg': 'inset 0 8px 16px rgba(216, 194, 170)',
            },
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}
