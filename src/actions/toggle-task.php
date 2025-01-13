<?php

require_once __DIR__ . "/../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $taskId = htmlspecialchars($_POST["id"]);

  $sql = "UPDATE Tasks SET completed = !completed WHERE id = :id";

  $statement = $db->prepare($sql);
  $statement->execute([":id" => $taskId]);

  $previousUrl = $_SERVER["HTTP_REFERER"] ?? "/";

  header("Location: $previousUrl");;
} else {
  header("Location: /");
}
