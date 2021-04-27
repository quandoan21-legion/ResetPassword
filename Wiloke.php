<?php
/*
Plugin Name: Wiloke
Plugin URI: https://quandoan21.com/sadwa
Description: Reset ur password.sdawdsad
Version: 1.0.0
Author: Quan "Legsadasdwaion" Doan
Author URI: https://quansdawdsadwdaon21.com/
Text Domain: quansdadwdawdawddoan21
*/
namespace Wiloke;

require_once plugin_dir_path(__FILE__) . 'vendor/autoload.php';

use Users\Controllers\UserControllers as UserControllers;

define('WILOKE_JWT_CLIENT_API_NAMESPACE', __NAMESPACE__);
define('WILOKE_JWT_CLIENT_API_VERSION', 'v1');
define('WILOKE_JWT_CLIENT_API', WILOKE_JWT_CLIENT_API_NAMESPACE . '/' . WILOKE_JWT_CLIENT_API_VERSION);
define('WILOKE_JWT_CLIENT_PREFIX', 'wiloke-jwt_');

new UserControllers();