const mix = require('laravel-mix');


// mix.options({
//     hmrOptions: {
//         host: 'localhost',
//         port: '3939'
//     },
// });

// mix.webpackConfig({
//     devServer: {
//         port: '3939'
//     },
// });


mix.ts('resources/ts/index.tsx', 'public/js').react()
    .postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
])
.browserSync({proxy:'localhost:3939'});
