<?php

class Auth
{
    public static function isLoggedIn()
    {
        if (isset($_SESSION['USER'])) {
            return true;
        }
        return false;
    }

    public static function logout()
    {
        if (isset($_SESSION['USER'])) {
            unset($_SESSION['USER']);
        }
    }

    public static function is_own_content($row = false)
    {
        if (isset($_POST['USER'])) {
            return false;
        }

        if (isset($row->user_id)) {
            if ($row->user_id === $_SESSION['USER']->user_id) {
                return true;
            }
        }
        return false;
    }


}