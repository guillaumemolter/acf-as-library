# acf-as-library
Easy and clean config of the Advanced Custom Fields WordPress plugin to load it as a composer library.

Simplify the process described here: https://www.advancedcustomfields.com/resources/including-acf-in-a-plugin-theme/

## How to use:
1. Make sure you have an environment varible with you ACF licence key `export ACF_PRO_KEY=XXXXXXX`
2. Then add this library to your plugin or theme `composer require guillaumemolter/acf-as-library`
3. Finally inside of your plugin or theme:

```
<?php
include 
require_once("vendor/guillaumemolter/acf-pro-installer/src/ACFAsLibrary/ACF_Lib.php"); // Not necessary if you use composer autoload.

$path_to_acf =  $path_to_plugin . '/vendor/advanced-custom-fields/advanced-custom-fields-pro/'; // Replace $path_to_plugin by the actual path.
$url_to_acf =  $url_to_plugin . '/vendor/advanced-custom-fields/advanced-custom-fields-pro/'; // Replace $url_to_plugin by the actual url.

$acf_as_library = new ACF_Lib( $path_to_acf, $url_to_acf );
$acf_as_library->init();
?>
