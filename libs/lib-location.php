<?php

# Add Location
function insertLocation($data)
{
    global $pdo;
    $sql = "INSERT INTO locations (Title, lng, lat,type) VALUES (:Title, :lng  , :lat , :type)";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([":Title" => $data["title"], ":lng" => $data["lng"], ":lat" => $data["lat"], ":type" => $data["type"]]);
    return $stmt -> rowCount();
}

# get locations
function getLocations($params=[])
{
    global $pdo;
    $condition = '';
    if (isset($params['verified']) and in_array($params['verified'],['0','1']))
    {
        $condition = "where verified = {$params['verified']}";
    }
    $sql = "SELECT * FROM locations $condition";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_OBJ);
}