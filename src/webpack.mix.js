const mix = require("laravel-mix");
// require("mix-env-file");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js("resources/js/index.js", "public/js").js(
    "resources/js/form.js",
    "public/js"
);
// not work
// .browserSync({
//     // container_name
//     proxy: {
//         target: "http://localhost:8080",
//     },
//     files: ["resources/views/**/*.blade.php", "public/**/*"],
//     open: false,
//     reloadOnRestart: true,
// });

// .js("resources/js/app.js", "public/js")
// .postCss("resources/css/app.css", "public/css", [
//     //
// ]);

// mix.env(process.env.ENV_FILE);

// キャッシュによりCSSが反映されないのを避けるため
if (mix.inProduction()) {
    mix.version();
}
