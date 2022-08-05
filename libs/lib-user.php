<?php

#check Login
function isLoggedIn()
{
    return isset($_SESSION['login']);
}

#login
function login($username,$password)
{
    global $admins;
    if (array_key_exists($username,$admins)
    and password_verify($password,$admins[$username]))
    {
        $_SESSION['login'] = 1;
        return true;
    }
    return false;
}

#log out
function logOut()
{
    unset($_SESSION['login']);
}