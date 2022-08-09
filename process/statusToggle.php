<?php
include "../Bootstrap/init.php";

# check request type
if (!isAjaxRequest())
{
    diePage("Invalid Request");
}
// ajax ok
if (!isset($_POST['loc']))
{
    Messeg("Invalid Location");
    die();
}
echo statusToggle($_POST['loc']);
