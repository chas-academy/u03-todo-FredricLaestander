<?php require_once "database.php"; ?>

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
                <h1>Headline here</h1>
                <p><?php echo date("F j, l") ?></p>
            </div>
        </header>

        <div class="tasks">
            <?php
            $query = $db->prepare("SELECT * FROM Tasks");
            $query->execute();
            $tasks = $query->fetchAll();

            foreach ($tasks as $task) :
            ?>
                <details class="task">
                    <summary>
                        <div class="content">
                            <form method="post" action="/actions/toggle-task.php" class="<?= $task["completed"] ? "checked" : "unchecked" ?>">
                                <input type="hidden" name="id" value="<?= $task["id"] ?>" />
                                <button type="submit"></button>
                            </form>
                            <div class="task-head">
                                <h2 class="<?= $task["completed"] ? "title-checked" : "title-unchecked" ?>"><?= $task["title"] ?></h2>
                                <div class="date-time">
                                    <p><?= $task["location"] ?></p>
                                    <p><?= $task["date"] ?></p>
                                    <p><?= $task["time"] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="tools">
                            <a href="/edit-task.php?task=<?= $task['id'] ?>" class="pen">
                            </a>

                            <?php if ($task["important"]) : ?>
                                <div class="pin-filled"></div>
                            <?php else : ?>
                                <div class="pin"></div>
                            <?php endif ?>
                        </div>
                    </summary>

                    <p class="description"><?= $task["description"] ?></p>
                </details>
            <?php endforeach; ?>
        </div>

        <form method="post" action="/actions/create-task.php" class="createtask">
            <img src="assets/icons/plus.svg" alt="add task not checked">
            <input type="text" placeholder="Add an assignment..." name="task" required />
        </form>
    </main>
</body>

</html>