# Tainacan Itaipu

Child theme of the Tainacan Interface theme for use with the Tainacan plugin

## Getting Start

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites installed

What things you need to install the theme

```
git
npm
```

### Installing

step by step

Clone the repository
```
git clone git@github.com:medialab-ufg/tainacan-itaipu.git
```

Open the folder and run the command
```
npm install
```
this installed all dependences to theme

Open the file config.js
```
/** Set here the wp theme folder */

module.exports = {
    "wp_theme_folder": "/var/www/wp/wp-content/themes/tainacan-itaipu/"
}
```
and set the folder of your wordpress themes

salve and close.

To finish run the command to build and close the command
```
gulp build
```
or run the command to build and wath the modifications
```
gulp
```
