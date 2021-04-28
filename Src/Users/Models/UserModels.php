<?php

namespace Users\Models;

use Src\Response as Response;

class UserModels
{
    protected string $currentUserId = '1';

    public function checkingPassword($userInputPassword): bool
    {
        $currentHashPassword = get_userdata($this->currentUserId)->data->user_pass;
        $result              = wp_check_password($userInputPassword, $currentHashPassword);
        return $result;
    }
    public function changeUserPassword(string $newPassword)
    {
        if ($newPassword == $_POST['current_password']) {
            return new \WP_REST_Response([
                'error' =>  [
                    'msg' => 'SAME PASSWORD'
                ]
                ], 400);
        } else {
            wp_set_password($newPassword, $this->currentUserId);
            Response::response([
                'msg'    => esc_html('Changed Password'),
                'Status' => 200,
            ]);
        }
    }
}
