<?php

require_once __DIR__ . "/../database.php";

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $taskName = htmlspecialchars($_POST["task"]);

  $sql = "INSERT INTO Tasks (title) VALUES (:title)";

  $statement = $db->prepare($sql);
  $statement->execute([":title" => $taskName]);
  header("Location: /");
} else {
  header("Location: /");
}