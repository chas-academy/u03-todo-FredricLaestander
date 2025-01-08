<?php require_once "database.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Document</title>
</head>

<body>
  <aside>
    <nav>
      <!-- sökfält för att söka efter task rubriker -->
      <a href="">
        <img src="assets/icons/sun.svg" alt="sun">My day
      </a>
      <a href=""><img src="assets/icons/calendar.svg" alt="calendar">Scheduled plans
      </a>
      <a href="">
        <img src="assets/icons/pin/pin-blue.svg" alt="pin">Important
      </a>
      <a href="">
        <img src="assets/icons/folder.svg" alt="folder">All assignements
      </a>
    </nav>
  </aside>

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
              <div class="taskhead">
                <h2 class="<?= $task["completed"] ? "title-checked" : "title-unchecked" ?>"><?= $task["title"] ?></h2>
                <div class="datetime">
                  <p><?= $task["location"] ?></p>
                  <p><?= $task["deadline"] ?></p>
                </div>
              </div>
            </div>

            <div class="tools">
              <div class="pen"></div>

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