<?php
require_once "database.php";

$query = $db->prepare("SELECT * FROM Tasks WHERE id = :id");
$query->execute([":id" => $_GET["task"]]);
$task = $query->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Document</title>
</head>

<body>

  <?php require_once __DIR__ . "/components/sidebar.php"; ?>

  <main class="edit">

    <form method="post" class="task" action="/actions/update-task.php">
      <!-- okej h2 ser bra ut men jag vill inte att texten ska vara överstruken om man vill edita ett färdigt task.. -->
      <div class="task-head">
        <input type="text" name="task" placeholder="Title" value="<?= $task["title"] ?>" />
        <div class="tools">
          <div class="trash-can"></div>

          <?php if ($task["important"]) : ?>
            <div class="pin-filled"></div>
          <?php else : ?>
            <div class="pin"></div>
          <?php endif ?>
        </div>
      </div>

      <div class="date-time">
        <img src="/assets/icons/calendar-clock.svg" alt="Calendar and clock">
        <input type="date" name="date" value="<?= $task["date"] ?>">
        <input type="time" name="time" value="<?= $task["time"] ?>">
      </div>

      <div class="location">
        <img src="/assets/icons/map-pin.svg" alt="Map pin">
        <input type="text" name="location" value="<?= $task["location"] ?>">
      </div>

      <textarea name="description" rows="4" class="description"><?= $task["description"] ?></textarea>

      <div class="buttons">
        <a href="/">Cancel</a>
        <button type="submit">Save</button>
      </div>
    </form>
  </main>

</body>

</html>