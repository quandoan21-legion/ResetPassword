<?php

namespace Users\Models;

class UserModels
{
    protected string $currentUserId = "1";

    public function checkingPassword() : bool
    {
        $currentHashPassword = get_userdata($this->currentUserId)->data->user_pass;
        $userInputPassword   = ($_POST['current_password']);
        $result              = wp_check_password($userInputPassword, $currentHashPassword);
        return $result;
    }
    public function changeUserPassword(string $newPassword) : string
    {

        if ($newPassword == $_POST['current_password']) {
            return "Your new password is the same with your old password. Please choose a different password";
        }
        wp_set_password($newPassword, $this->currentUserId);
        return "changed password";
    }
}
