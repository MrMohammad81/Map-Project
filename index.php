<?php
include "Bootstrap/init.php";

$location = false;
if (isset($_GET['loc']) && is_numeric($_GET['loc']))
{
    $location = getLocationID($_GET['loc']);
}
include "template/tpl-index.php";