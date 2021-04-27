<?php
/*
Plugin Name: Wiloke Reset Password
Plugin URI: https://quandoan21.com/
Description: Reset ur password.
Version: 1.0.0
Author: Quan "LEgion" Doan
Author URI: https://quandaon21.com/
Text Domain: quandoan21
*/

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';
use Users\Controllers\UserControllers as UserControllers;

new UserControllers();