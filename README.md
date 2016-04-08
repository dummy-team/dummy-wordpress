# Dummy Wordpress
Dummy Wordpress is a starter theme designed to help you build Wordpress websites in a sane environment. It's main purpose is to provide a solid template system to keep the html away from the PHP, while keeping your sanity healty dealing with the `function.php`.

It is based on [Timber](https://github.com/jarednova/timber) powered by the [Twig Template Engine](http://twig.sensiolabs.org/).

[![Join the chat at https://gitter.im/Inouit/wp-dummy-twig](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Inouit/wp-dummy-twig?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

# Features
## Wordpress configuration
To prevent the creation of a big messy `function.php`, Dummy Wordpress is packed with helper classes and a well [structured php](https://github.com/dummy-team/wp-dummy-twig/tree/master/lib).

## Back-end editing
We like to provide the website contributors a rich layout system with a fully editable front-end, to do so we use [Visual composer](http://vc.wpbakery.com/). [Reusable components](dummy-team/wp-components) (*shortcodes*) will be available soon.

## Timber & Twig
To ease the sustainability of your views, Timber is based on Twig. The template files structure reflects the Wordpress scheme. Twig files use `blocks` and `includes` to keep everything DRY. Commonly used templates: posts, header, footer, single... are already packed And because most websites needs navigation and pagination they are both included.

## Front-end
To manage styles and scripts you can use any css frameworks you like. They will live in the web folder. We recommend our own solution :wink:, the [dummy](dummy-team.github.io/dummy/) which provide a powerful automated frame around the ITCSS principles. [Visual composer](http://vc.wpbakery.com/) use the [Bootstrap grid](https://getbootstrap.com/css/#grid).

# Install
## Requirements
First you'll need to [install Wordpress](http://codex.wordpress.org/Installing_WordPress) then get the [Timber plugin](https://github.com/jarednova/timber#installation).
While it isn't required, the [Visual composer plugin](http://vc.wpbakery.com/) works very well with Dummy Wordpress.

## Get it from github
To install this starter theme download [sources](https://github.com/dummy-team/wp-dummy-twig/archive/master.tar.gz) from github and extract it in your worpdress theme folder, then activate it.

# Usage
## Configuration
The lib folder will host all the Wordpress php configuration usually found in the `function.php`.

## Custom contents
To ease the *shortcodes* use, all of our components are provided with the Visual Composer back-end configuration, it allow your contributors to manage advanced content without any coding knowledges.

To manage additional content fields, Timber works great with [Advanced Custom Fields](http://www.advancedcustomfields.com/).

## View integration
The view folder contains Twig layouts, templates and partials. This is also where you'll find the *shortcodes* configuration and templates.

## Front-end development
The web folder is were you'll put your front-end framework & resources: styles, scripts and images. The dummy can be put as it is with a minimal configuration. Either edit the `parameters.coffee` or create a `parameters_local.coffee` in the grunt folder:
``` coffeescript
# {theme folder}/web/grunt/parameters_local.coffee
module.exports =
  sync:
    # Files which trigger a browser reload
    files: [
      '../*.html'
      '../css/*.css'
      '../js/*.js'
      '../img/**'
      '../../**.twig'
      '../../**.php'
    ]
    # Start a basic file server
    server: false
    # Use an existing server (apache,node...)
    proxy: 'dummy.wordpress.local'
    # Open browser on server start
    open: false
```


To fully use the Dummy Wordpress some recipes are available in the [wiki](wiki) and in [Timber documentation](https://github.com/jarednova/timber/wiki)

# Keep in touch
If you find any caveats using it or have suggestions to improve the tool we gladly accept [Pull Requests](https://github.com/dummy-team/wp-dummy-twig/tree/master/CONTRIBUTING.md#submitting-a-pull-request) and [issues](https://github.com/dummy-team/wp-dummy-twig/issues).


# Coding Standards
## PHP

PHP Coding Standards is based on Wordpress PHP Coding Standards (see : https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/), example below
``` php
#my-example.php
class My_Example {
  protected $my_example_variable = 'Example variable';

  public function __construct() {
    
  }

  public function my_example_function( $my_example_variable ) {
    if( true === $my_example_variable ) {
      return 'Example';
    }
    else {
      $this->my_example_function( $parameter );
    }
  }
}
```

## CSS

Never use camelCase while naming file or css class

Prefix name by function, example below
``` css
_block-editorial.scss
.block-editorial { ... }

_nav-footer.scss
.nav-footer { ... }
```

## TWIG

Never use camelCase while naming file

Use _ character to separate words for names of variables

Use - character to separate words for filenames

Example : display_breadcrumb variable name is correct, displayBreadcrumb is incorrect

Use a lot of blocks as possible
```
{% block header %} {% endblock %}
{% block footer %} {% endblock %}
{% block ipsum %} {% endblock %}
{% block ... %} {% endblock %}
```

