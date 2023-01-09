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

    public static function logout() {
        if(isset($_SESSION['USER'])){
            unset($_SESSION['USER']);
        }
    }

}