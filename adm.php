<?php

use Hekmatinasser\Verta\Verta;

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

#delete locations
if (isset($_GET['delete_loc']) && is_numeric($_GET['delete_loc']))
{
    $deleteLoc = deleteLocations($_GET['delete_loc']);
}

#check login
if (isLoggedIn())
{
    $params = $_GET ?? [];
    $locations = getLocations($params);
    include "template/tpl-adm.php";
}else{
    include "template/tpl-adm-auth.php";
}
