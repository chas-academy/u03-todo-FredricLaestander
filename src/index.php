<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <img src="assets/icons/pin.svg" alt="pin">Important
                </a>
                <a href="">
                    <img src="assets/icons/folder.svg" alt="folder">All assignements
                </a>
            </nav>
        </aside>

        <main>
            <section>
                <H1>Headline here</H1>
                <!-- Hämta ut från databas -->
                <!-- 9th of december, monday -->
                <p>day of month, weekday</p>
            </section>

            <div class="tasks">
                <div class="task">
                    <div class="content">
                        <img src="assets/icons/checked/checked_false.svg" alt="not checked icon">
                        <div class="taskhead">
                            <h2>Title</h2>
                            <div class="datetime">
                                <p>location:</p>
                                <p>hour:minute</p>
                            </div>
                        </div>
                    </div>

                    <!-- task description -->
                    <p>Text</p>

                    <div class="tools">
                        <img src="assets/icons/pen.svg" alt="edit not checked">
                        <img src="assets/icons/pin.svg" alt="important not checked">
                    </div>
                </div>
            </div>

            <div class="createtask">
                <img src="assets/icons/plus.svg" alt="add task not checked">
                <img src="assets/icons/ellipse.svg" alt="add task checked">
                <p>Add assignements...</p>
            </div>
        </main>
    </body>
</html>
    