<?php

require_once __DIR__ . "/../database.php";

//My day
function getMyDay()
{
    global $db;
    $query = $db->prepare("SELECT * FROM Tasks WHERE date = CURRENT_DATE");
    $query->execute();
    return $query->fetchAll();
}

//All assignements
function getAllAssignments()
{
    global $db;
    $query = $db->prepare("SELECT * FROM Tasks");
    $query->execute();
    return $query->fetchALL();
}
