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
    elseif (isset($params['keyword']))
    {
        $condition = " WHERE verified = 1 AND Title LIKE '%{$params['keyword']}%'";
    }
    $sql = "SELECT * FROM locations $condition";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_OBJ);
}

#delete location
function deleteLocations($data)
{
    global $pdo;
    $sql = "DELETE FROM locations WHERE ID = :ID";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':ID'=>$data]);
    return $stmt->rowCount();
}

# get locationID
function getLocationID($id)
{
    global $pdo;
    $sql = "SELECT * FROM locations WHERE ID = :ID";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':ID'=>$id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

# change Status Toggle
function statusToggle($id)
{
    global $pdo;
    $sql = "UPDATE locations SET verified = 1 - verified WHERE locations.ID = :id";
    $stmt = $pdo -> prepare($sql);
    $stmt -> execute([':id' => $id]);
    return $stmt -> rowCount();
}