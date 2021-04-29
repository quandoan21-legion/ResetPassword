<?php
/*
Plugin Name: Wilokeád
Plugin URI: https://quandoan21.com/sadwa
Description: Reset ur password.sdawdsad
Version: 1.0.0
Author: Quan "Legsadasdwaion" Doan
Author URI: https://quansdawdsadwdaon21.com/
Text Domain: quansdadwdawdawddoan21
*/

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

use ResetPassword\Users\Controllers\UserController as UserController;

define('WILOKE_API_NAMESPACE', 'Wiloke');
define('WILOKE_API_VERSION', 'v1');
define('WILOKE_API', WILOKE_API_NAMESPACE . '/' . WILOKE_API_VERSION);
new UserController();