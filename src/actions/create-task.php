<?php

require_once __DIR__ . "/../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $page = $_GET["page"];
    $taskName = htmlspecialchars($_POST["task"]);

    if (empty($page) || $page === "scheduled-plans") {
        $sql = "INSERT INTO Tasks (title, date) VALUES (:title, CURRENT_DATE)";
    } elseif ($page === "important") {
        $sql = "INSERT INTO Tasks (title, important) VALUES (:title, 1)";
    } else {
        $sql = "INSERT INTO Tasks (title) VALUES (:title)";
    }

    $statement = $db->prepare($sql);
    $statement->execute([":title" => $taskName]);

    $previousUrl = $_SERVER["HTTP_REFERER"] ?? "/";

    header("Location: $previousUrl");
} else {
    header("Location: /");
}
