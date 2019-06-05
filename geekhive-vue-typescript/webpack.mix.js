let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
let path = require('path');

const purgecss = require('@fullhuman/postcss-purgecss')({
  // Specify the paths to all of the template files in your project
  content: ['./**/*.php', './assets/vue/**/*.vue'],

  // Include any special characters you're using in this regular expression
  defaultExtractor: content => content.match(/[A-Za-z0-9-_:/]+/g) || [],
});

mix
  .ts('assets/vue/main.ts', 'dist/js')
  .postCss('assets/css/styles.css', 'dist/css', [
    tailwindcss('./assets/tailwind.js'),
    require('autoprefixer'),
    ...(process.env.NODE_ENV === 'production' ? [purgecss] : []),
  ])
  .minify('dist/css/styles.css') // Minify only css
  .webpackConfig({
    output: { chunkFilename: 'js/[name].[contenthash].js' },
    resolve: {
      extensions: ['.js', '.vue'],
      alias: {
        vue$: 'vue/dist/vue.runtime.js',
        '@': path.resolve('assets/vue'),
        '~': path.resolve('assets/css'),
      },
    },
  });

// Note: Autoprefixer enabled by default.
mix
  .sass('./assets/css/main.scss', 'dist/css')
  .options({
    postCss: [...(process.env.NODE_ENV === 'production' ? [purgecss] : [])],
  })
  .minify('dist/css/main.css');
