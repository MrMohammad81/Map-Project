<?php
include "../Bootstrap/init.php";

# check request type
if (!isAjaxRequest())
{
    diePage("Invalid Request");
}
if (insertLocation($_POST))
{
    echo "مکان شما با موفقیت ثبت شد. درانتظار تایید....";
}else{
    echo "خطا در ثبت مکان.";
}
