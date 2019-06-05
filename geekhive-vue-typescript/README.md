# Vue Classic

Boilerplate theme integrating Vue with a standard WordPress installation.

## Setup
* Make sure to use the latest version of node (10.15.0)
* Install and activate this theme
* Run `yarn install` to install all dependencies
* Run `yarn run watch` to run autoloading compilation
* If ready for production, run `npm run production`. All assets will be generated in the `dist` directory.

__NOTE:__ Make sure to adjust the `assets/tailwind.js` configuration file to your needs. A lot of the
Tailwind defaults have been untouched - except for background and text colors - for you convenience.
However, this is not recommended since tailwind provides a large default color palette which in turn,
generates a larger styles sheet.
* Reference: [https://tailwindcss.com/docs/controlling-file-size](https://tailwindcss.com/docs/controlling-file-size)