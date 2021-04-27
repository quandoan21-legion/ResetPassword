<?php

namespace Users\Controllers;

use Users\Models\UserModels as UserModels;

class UserControllers
{
    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRouters']);
    }

    public function registerRouters()
    {
        register_rest_route(
            "WILOKE_RUP_API",
            'reset_password',
            [
                'methods'             => 'POST',
                'callback'            => [$this, 'changingPassword'],
                'permission_callback' => '__return_true'
            ]
        );
    }
    public function changingPassword() : string
    {
        $oModels            = new UserModels();
        $newPassword        = $_POST['new_password'];
        $comfirmNewPassword = $_POST['comfirm_new_password'];
        if ($oModels->checkingPassword()) {
            if ($newPassword === $comfirmNewPassword) {
                return $oModels->changeUserPassword($newPassword);
            }
            return "2 new passwords is not identical";
        } else {
            return "Your current password is not match ";
        }
    }
}
