<?php

function formatDate(string $dateString)
{
    $taskDate = (new DateTime($dateString))->format("Y-m-d");

    $today = new DateTime();
    $yesterday = (clone $today)->modify("-1 day");
    $tomorrow = (clone $today)->modify("+1 day");

    if ($taskDate === $today->format("Y-m-d")) {
        return ["text" => "today", "class" => "today"];
    }

    if ($taskDate === $yesterday->format("Y-m-d")) {
        return ["text" => "yesterday", "class" => "yesterday"];
    }

    if ($taskDate === $tomorrow->format("Y-m-d")) {
        return ["text" => "tomorrow", "class" => "tomorrow"];
    }

    if ($taskDate < $yesterday) {
        return ["text" => $taskDate, "class" => "past"];
    }

    return ["text" => $taskDate, "class" => "future"];
}
