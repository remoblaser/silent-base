<?php
/*
Plugin Name: SILENTGAMING Base
Plugin URI:  https://github.com/remoblaser/silent-base
Description: WP Plugin to manage requirements for SILENTGAMING
Version:     1.0
Author:      Remo Blaser
Text Domain: rb
*/
//Dump helper
if(! function_exists('dd'))
{
    function dd($bag)
    {
        var_dump($bag);
        exit;
    }
}

require_once('vendor/autoload.php');

use Remoblaser\Plugin\SilentBase;

$plugin = new SilentBase();

$plugin->init();


