<?php
require_once "database.php";
require_once "functions/filter-page.php";
require_once "functions/format-date.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Document</title>
</head>

<body class="start">

    <?php require_once __DIR__ . "/components/sidebar.php"; ?>

    <main>
        <header>
            <img src="assets/icons/menu.svg" alt="menu">

            <div class="text">
                <h1>
                    <?php

                    $page = isset($_GET["page"]) ? $_GET["page"] : null;

                    switch ($page) {
                        case "scheduled-plans":
                            echo "Scheduled plans";
                            break;

                        case "important":
                            echo "Important";
                            break;

                        case "all-assignments":
                            echo "All assignments";
                            break;

                        default:
                            echo "My day";
                    }
                    ?>
                </h1>
                <p><?php echo date("F j, l") ?></p>
            </div>
        </header>

        <div class="tasks">
            <?php

            switch ($page) {
                case "scheduled-plans":
                    $tasks = getScheduledPlans();
                    break;

                case "important":
                    $tasks = getImportant();
                    break;

                case "all-assignments":
                    $tasks = getAllAssignments();
                    break;

                default:
                    $tasks = getMyDay();
            }

            foreach ($tasks as $task) :
                ?>
                <details class="task <?= $task["completed"] ? "checked" : "unchecked" ?>">
                    <summary>
                        <div class="content">
                            <form method="post" action="/actions/toggle-task.php">
                                <input type="hidden" name="id" value="<?= $task["id"] ?>" />
                                <button type="submit"></button>
                            </form>
                            <div class="task-head">
                                <h2 class="<?= $task["completed"] ? "title-checked" : "title-unchecked" ?>">
                                    <?= $task["title"] ?>
                                </h2>
                                <div class="date-time">
                                    <?php if (isset($task["location"])) : ?>
                                        <p><?= $task["location"] ?></p>
                                    <?php endif; ?>

                                    <?php if (isset($task["date"])) : ?>
                                        <p class="<?= formatDate($task["date"])["class"] ?>">
                                            <?= formatDate($task["date"])["text"]; ?>
                                        </p>
                                    <?php endif; ?>
                                    <p><?= $task["time"] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="tools">
                            <a href="/edit-task.php?task=<?= $task['id'] ?>" class="pen"></a>

                            <form
                                method="post"
                                action="/actions/important-task.php"
                                class="<?= $task["important"] ? "pin-filled" : "pin" ?>">
                                <input type="hidden" name="id" value="<?= $task["id"] ?>" />
                                <button type="submit"></button>
                            </form>
                        </div>
                    </summary>

                    <p class="description"><?= $task["description"] ?></p>
                </details>
            <?php endforeach; ?>
        </div>
        <form method="post" action="/actions/create-task.php?page=<?= $page ?>" class="createtask">
            <img src="assets/icons/plus.svg" alt="add task not checked">
            <input type="text" placeholder="Add an assignment..." name="task" required />
        </form>
    </main>
</body>

</html>