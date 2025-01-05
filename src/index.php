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
      <details class="task">
        <summary>
          <div class="content">
            <div class="checked"></div>
            <div class="taskhead">
              <h2>Title</h2>
              <div class="datetime">
                <p>location:</p>
                <p>hour:minute</p>
              </div>
            </div>
          </div>

          <div class="tools">
            <div class="pen"></div>
            <div class="pin"></div>
          </div>
        </summary>

        <p class="description">Text</p>
      </details>
    </div>

    <div class="createtask">
      <img src="assets/icons/plus.svg" alt="add task not checked">
      <input type="text" placeholder="Add an assignment..." name="task" />
    </div>
  </main>
</body>

</html>