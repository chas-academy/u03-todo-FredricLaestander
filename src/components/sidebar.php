<?php
$activePage = isset($_GET["page"]) ? $_GET["page"] : null;
?>

<aside>
  <nav>
    <!-- sökfält för att söka efter task rubriker -->
    <a href="/" class="<?= $activePage === null ? 'active' : '' ?>">
      <img src="assets/icons/sun.svg" alt="sun">My day
    </a>

    <a href="/?page=scheduled-plans" class="<?= $activePage === "scheduled-plans" ? 'active' : '' ?>">
      <img src="assets/icons/calendar.svg" alt="calendar">Scheduled plans
    </a>

    <a href="/?page=important" class="<?= $activePage === "important" ? 'active' : '' ?>">
      <img src="assets/icons/pin/pin-blue.svg" alt="pin">Important
    </a>

    <a href="/?page=all-assignments" class="<?= $activePage === "all-assignments" ? 'active' : '' ?>">
      <img src="assets/icons/folder.svg" alt="folder">All assignements
    </a>
  </nav>
</aside>