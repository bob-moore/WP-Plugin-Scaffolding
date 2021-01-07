# WordPress Plugin Scaffolding

A standardized, organized, object-oriented foundation for rapid plugin development. Inspired by the [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) and informed by years of professional plugin development.

## Features

* The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](http://codex.wordpress.org/WordPress_Coding_Standards), and [Documentation Standards](https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/).
* All classes, functions, and variables are documented so that you know what you need to change.
* WP Plugin Scaffolding uses a strict file organization scheme that corresponds both to the PSR-4 autoloading scheme, and that makes it easy to organize the files that compose the plugin.
* The project used composer to manage autoloading, and gulp + webpack to compile scss and javascript

## Installation

WP Plugin Scaffolding can be installed directly into your plugins folder as is. After that, you will want to rename your folder and main plugin file, the namespace, and the main class.

* rename folder from `WP-Plugin-Scaffolding` to `my-plugin-name`
* rename main file from `plugin-scaffolding.php` to `my-plugin-name.php`
* find & replace `wpcl\pluginscaffolding` to `mypackage\mynamespace` across all files
* replace all instances of `wpcl\\pluginscaffolding\\` to `mypackage\\mynamespace\\` in composer.json
* replace `PluginScaffolding` to `MyPluginClass` in the main plugin file
* change package and other information in documentation as necessary
* finally, run `composer install` which will configure autoloading and in turn run `npm install` to install node_modules


It is safe to activate the plugin at this point. The plugin includes a sample custom post type, sample custom taxonomy, and a sample custom widget. If these are not going to be used, simply delete the respective files.

## ToDo

This is a living project, and there are several items not yet complete. The major issue to be tackled is documentation. Including detailed usage instructions.