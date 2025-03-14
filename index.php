<?php

?>
<html>
    <head>
        <title>Portfolio</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <nav id="menu">
            menu here
        </nav>
        <div id="intro">
            introduction
        </div>
        <div id="projects">
            projects here
            <?php include("./includes/projects.php");?>
        </div>
        <div id="contact">
            <form method="post">
                <label for="name">Naam: </label> <br>
                <input type="text" name="name"> <br>
                <label for="email">E-mail: </label> <br>
                <input type="email" name="email"> <br>
                <label for="message">Bericht: </label> <br>
                <textarea name="message" id="message" rows="20" cols="50"></textarea>
            </form>
        </div>
    </body>
    <footer>
        footer
    </footer>
</html>