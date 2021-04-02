const path = require('path');
const mix = require('laravel-mix');



module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};

mix.sass('resources/sass/app.sass', 'public/css');


