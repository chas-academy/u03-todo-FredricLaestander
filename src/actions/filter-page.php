<?php

require_once __DIR__ . "/../database.php";

function getMyDay()
{
    global $db;
    $query = $db->prepare("SELECT * FROM Tasks WHERE date = CURRENT_DATE");
    $query->execute();
    return $query->fetchAll();
}

function getAllAssignments()
{
    global $db;
    $query = $db->prepare("SELECT * FROM Tasks");
    $query->execute();
    return $query->fetchALL();
}

function getImportant()
{
    global $db;
    $query = $db->prepare("SELECT * FROM Tasks WHERE important = 1");
    $query->execute();
    return $query->fetchAll();
}

function getScheduledPlans()
{
    global $db;
    $query = $db->prepare("
    SELECT * FROM Tasks
    WHERE date >= CURRENT_DATE + INTERVAL 1 DAY 
    ORDER BY date ASC, 
        CASE 
            WHEN time IS NULL THEN 1 
            ELSE 0 
        END DESC, time ASC
    ");
    $query->execute();
    return $query->fetchAll();
}
