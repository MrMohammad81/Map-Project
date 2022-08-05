<?php
include_once "../Bootstrap/init.php";

# Add Location
function insertLocation($data)
{
    global $pdo;
    $sql = "INSERT INTO locations (Title, lng, lat,type) VALUES (:Title, :lng  , :lat , :type)";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([":Title" => $data["title"], ":lng" => $data["lng"], ":lat" => $data["lat"], ":type" => $data["type"]]);
    return $stmt -> rowCount();
}
