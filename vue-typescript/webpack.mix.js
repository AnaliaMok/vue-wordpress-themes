let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
let path = require('path');

mix
  .ts('assets/vue/main.ts', 'dist/js')
  .postCss('assets/css/styles.css', 'dist/css', [
    tailwindcss('./assets/tailwind.js'),
  ])
  .minify('dist/css/styles.css') // Minify only css
  .webpackConfig({
    output: { chunkFilename: 'js/[name].[contenthash].js' },
    resolve: {
      extensions: ['.js', '.vue'],
      alias: {
        vue$: 'vue/dist/vue.runtime.js',
        '@': path.resolve('assets/vue'),
      },
    },
  });
