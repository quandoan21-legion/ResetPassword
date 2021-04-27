<?php

namespace Users\Controllers;

use Users\Models\UserModels as UserModels;

class UserControllers
{
    public $prefix = WILOKE_JWT_CLIENT_PREFIX;

    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRouters']);
    }

    public function registerRouters()
    {
        register_rest_route(
            WILOKE_JWT_CLIENT_API,
            '/me/reset-password',
            [
                'methods'             => 'POST',
                'callback'            => [$this, 'changingPassword'],
                'permission_callback' => '__return_true'
            ]
        );
    }
    public function changingPassword(\WP_REST_Request $oRequest) 
    {

        $vars = $oRequest->get_params();
        $newPassword        = $vars['new_password'];
        $comfirmNewPassword = $vars['confirm_new_password'];
        $oModels            = new UserModels();
        if ($oModels->checkingPassword($comfirmNewPassword)) {
            if ($newPassword === $comfirmNewPassword) {
                return $oModels->changeUserPassword($newPassword);
            }
            return [
                'msg'    => 'The old and new password must not be the same ',
                'status' => '400 BAD REQUEST',
            ];
        } else {
            return [
                'msg'    => 'The current password is incorrect',
                'status' => '400 BAD REQUEST',
            ];
        }
    }
}
