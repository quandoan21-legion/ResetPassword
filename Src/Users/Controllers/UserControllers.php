<?php

namespace Users\Controllers;

use Src\Response as Response;
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
        // var_dump($vars);die;
        $currentPassword        = $vars['current_password'];
        $newPassword        = $vars['new_password'];
        $comfirmNewPassword = $vars['confirm_new_password'];
        $oModels            = new UserModels();
        // return $oModels->checkingPassword($currentPassword); 
        if ($oModels->checkingPassword($currentPassword)) {
            if ($newPassword === $comfirmNewPassword) {
                $oModels->changeUserPassword($newPassword);
            } else {
                Response::response([
                    'msg'    => esc_html('The old and new password must not be the same '),
                    'Status' => 400,
                ]);
            }
        } else {
            Response::response([
                'msg'    => esc_html('The current password is incorrect'),
                'Status' => 400,
            ]);
        }
    }
}
