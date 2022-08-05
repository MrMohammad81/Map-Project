<?php
include "Bootstrap/init.php";

# log out
if (isset($_GET['logout']))
{
    logOut();
}

#login
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if (!login($_POST['username'],$_POST['password']))
    {
        Messeg("نام کاربری یا رمز عبور نامعتبر می باشد.");
    }
}
#check login
if (isLoggedIn())
{
    include "template/tpl-adm.php";
}else{
    include "template/tpl-adm-auth.php";
}
