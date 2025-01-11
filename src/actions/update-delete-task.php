<?php

require_once __DIR__ . "/../database.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["function"] === "delete") {
        $taskId = htmlspecialchars($_POST["id"]);

        $sql = "DELETE FROM Tasks WHERE id= :id";

        $statement = $db->prepare($sql);
        $statement->execute(["id" => $taskId]);
        header("Location: /");
    } elseif ($_POST["function"] === "save") {

        $taskId = htmlspecialchars($_POST["id"]);
        $taskTitle = htmlspecialchars($_POST["task"]);
        $taskDate = empty(htmlspecialchars($_POST["date"])) ? null : htmlspecialchars($_POST["date"]);
        $taskTime = empty(htmlspecialchars($_POST["time"])) ? null : htmlspecialchars($_POST["time"]);
        $taskDescription = htmlspecialchars($_POST["description"]);

        if ($taskDate === null && $taskTime) {
            $taskDate = date("Y-m-d");
        }

        $sql = "UPDATE Tasks SET title = :task, date = :date, time = :time, description = :details WHERE id = :id";

        $statement = $db->prepare($sql);
        $statement->execute([
            ":id" => $taskId,
            ":task" => $taskTitle,
            ":date" => $taskDate,
            ":time" => $taskTime,
            ":details" => $taskDescription
        ]);
        header("Location: /");
    } else {
        header("Location: /");
    }
}
