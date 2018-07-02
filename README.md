# Dummy Starter Theme

It is a starter theme powered by Timber and Dummy. It uses Sass, Babel and Twig.


## Usage
### Start server

```
wp server --host="0.0.0.0:8080"
```

### Start assets building and browser-sync

```
cd wp-content/themes/skin/
gulp
```


## Setup

### One line install
```
wp theme install https://github.com/dummy-team/dummy-wordpress/archive/master.zip; cd wp-content/themes/; mv dummy-wordpress skin; cd skin; wp plugin activate skin; composer install; npm install; gulp build;
```

## Step by step

```
# Install theme
wp theme install https://github.com/dummy-team/dummy-wordpress/archive/master.zip --activate;

# Install timber
cd wp-content/themes/dummy-wordpress
composer install

# Install gulp
npm install
gulp build

```
