<?php

class Auth
{
    public function __construct()
    {
        session_start();
    }

    public function setAuthData($userID, $userRole, $userUsername)
    {
        $_SESSION["USER_ID"] = $userID;
        $_SESSION["USER_ROLE"] = $userRole;
        $_SESSION["USER_USERNAME"] = $userUsername;

    }

    public static function IsUserLoggedIn(): bool
    {
        if (isset($_SESSION["USER_ID"])) {
            return true;
        }
        return false;
    }

    public static function getUserLoggedRole()
    {
        if (self::IsUserLoggedIn()) {
            return $_SESSION['USER_ROLE'];
        }
    }

    public function Logout()
    {
        session_destroy();
    }
}