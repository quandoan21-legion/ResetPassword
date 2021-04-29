<?php

namespace ResetPassword\Users\Controllers;

class UserController
{

    protected string $currentUserId = '1';
    // protected string $currentUserId = get_current_user_id();


    public function __construct()
    {
        add_action('rest_api_init', [$this, 'registerRouters']);
    }

    public function registerRouters()
    {
        register_rest_route(
            WILOKE_API,
            'me/reset-password',
            [
                'methods'             => 'POST',
                'callback'            => [$this, 'changingPassword'],
                'permission_callback' => '__return_true'
            ]
        );
    }

    public function checkingPassword($userInputPassword): bool
    {
        $currentHashPassword = get_userdata($this->currentUserId)->data->user_pass;
        $result              = wp_check_password($userInputPassword, $currentHashPassword);
        return $result;
    }

    public function changingPassword(\WP_REST_Request $oRequest)
    {

        $vars = $oRequest->get_params();
        $currentPassword    = $vars['current_password'];
        $newPassword        = $vars['new_password'];
        $comfirmNewPassword = $vars['confirm_new_password'];

        if (!empty($currentPassword) && 
            !empty($newPassword) && 
            !empty($comfirmNewPassword)) {

            if ($this->checkingPassword($currentPassword)) {

                if ($newPassword == $comfirmNewPassword) {
                    if ($newPassword == $_POST['current_password']) {

                        return new \WP_REST_Response([
                            'error'   => [
                                'msg' => 'Your new password need to be different from the old password'
                            ]
                        ], 400);
                    } else {
                        wp_set_password($newPassword, $this->currentUserId);
                        return new \WP_REST_Response([
                            'error'   => [
                                'msg' => 'Change password'
                            ]
                        ], 200);
                    }
                } else {
                    return new \WP_REST_Response([
                        'error'   => [
                            'msg' => 'Your two new passwords is not identical'
                        ]
                    ], 400);
                }                
                
            } else {
                return new \WP_REST_Response([
                    'error'   => [
                        'msg' => 'Your current password is incorrect'
                    ]
                ], 400);
            }
            
            
        } else {
            return new \WP_REST_Response([
                'error'   => [
                    'msg' => 'The required fields must be filled'
                ]
            ], 400);
        }
    }
}
