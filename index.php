<?php

?>
<html>
    <head>
        <title>Portfolio</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <nav id="menu">
        <h2><a class="jump" href="#projects">Projecten</a></h2>
        <h2><a class="jump" href="#contact">Contact</a></h2>
        </nav>
        <section id="intro">
            <h1>Over mij:</h1>
            <img id="portrait" src="images/portrait.jpg" alt="Portrait">
            <p class="text">
                Hallo mijn naam is Gert van Til, ik ben een web-developer met ervaring in: HTML, CSS, JAVASCRIPT en PHP.
            </p>
    
        </section>
        
        <section id="projects">
        <hr>
            <h1>Projecten:</h1>
            <?php include("./includes/projects.php");?>
            <hr>
        </section>
        
        <section id="contact">
            <h1>Contact:</h1>
            <form method="mailto:gert.vantil@gmail.com">
                <label class="formrow" for="name">Naam: </label><br>
                <input class="formrow" type="text" name="name"><br>
                <label class="formrow" for="email">E-mail: </label><br>
                <input class="formrow" type="email" name="email"><br>
                <label class="formrow" for="message">Bericht: </label><br>
                <textarea class="formrow" name="message" id="message" rows="20" cols="50"></textarea><br>
                <input class="formrow" type="submit" id="submitbutton" value="Versturen">
            </form>
            
        </section>
    </body>
    <footer>
        <h2><a href="https://github.com/Mem8or" target="_blank">github</a></h2>
        <a class="hidden" href="includes/login.php">CMS</a>
    </footer>
</html>