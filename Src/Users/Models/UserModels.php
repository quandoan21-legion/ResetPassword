<?php

namespace Users\Models;

use JsonSerializable;
use PhpMyAdmin\Plugins\Export\ExportJson;

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
            $this->error([
                'msg'    => esc_html('Your new password is the same with your old password. Please choose a different password'),
                'status' => 400,
            ]);
        } else {
            wp_set_password($newPassword, $this->currentUserId);
            $a=[
                'msg'    => 'changed password',
                'status' => '200 OK',
            ];
        }
    }
    function error(array $aAttrs = [])  
    {
        return json_encode($aAttrs);
    }
}
