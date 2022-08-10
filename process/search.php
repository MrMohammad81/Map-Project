<?php
include "../Bootstrap/init.php";

# check request type
if (!isAjaxRequest())
{
    diePage("Invalid Request");
}
// ajax is ok
$keywords = $_POST['keyword'];
if (!isset($keywords) or empty($keywords))
{
    die("لطفا نام مکان مورد نظر خود را وارد کنید....");
}
$location = getLocations(['keyword' => $keywords]);
if (sizeof($location) == 0)
{
    die("نتیجه ایی یافت نشد");

}
foreach ($location as $loc)
{
    echo "<a href='".BASE_URL."?loc=$loc->ID'><div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng'  data-loc='$loc->ID'>
     <span class='loc-type'>".locationTypes[$loc->type]."</span>
     <span class='loc-title'>$loc->Title</span>
  </div></a>";
}