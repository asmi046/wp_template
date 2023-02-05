let mix = require('laravel-mix');
// your Wordpress theme name here

const themePath = './_theme';

// var themename = "my_them";
// const themePath = 'wp-content/themes/' + themename + '';
// const resources = themePath + '/src';
// mix.setPublicPath(`${themePath}/assets`);

// mix.sass(`${resources}/scss/app.scss`, `${themePath}/assets/css`).sourceMaps();
// mix.js(`${resources}/js/app.js`, `${themePath}/assets/js`)

mix.browserSync({
    proxy: "localhost:8081",
    
    files: [
        './_theme/*.php'
    ]
});