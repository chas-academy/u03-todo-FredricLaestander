<?php

require_once __DIR__ . "/../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $taskId = htmlspecialchars($_POST["id"]);

    $sql = "UPDATE Tasks SET important = !important WHERE id = :id";

    $statement = $db->prepare($sql);
    $statement->execute([":id" => $taskId]);
    header("Location: /");
} else {
    header("Location: /");
}
