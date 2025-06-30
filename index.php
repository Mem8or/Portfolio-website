<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <nav id="menu">
            <h2 class="link"><a class="link" class="jump" href="#projects">Projecten</a></h2>
            <h2 class="link"><a class="link" class="jump" href="#contact">Contact</a></h2>
        </nav>
        
        <section id="intro">
            <h1>Over mij:</h1>
            <img id="portrait" src="images/portrait.jpg" alt="Portrait">
            <p class="text">
                Hallo mijn naam is Gert van Til, ik ben een web-developer met ervaring in: HTML, CSS, JAVASCRIPT en PHP.<br>
                Op deze website is het mogelijk om een paar van mijn afgemaakte opdrachten te bekijken.<br>
                Het is ook mogelijk om contact op te nemen via het contactformulier.<br>
                <br>
                Naast development heb ik ook een oog voor design en mediavormgeving, ik ben ook gezellig en fijn om mee te werken.
                <br><br>
                Ik hoop dat deze website een goed idee geeft wat van mij verwacht kan worden.
            </p>
        </section>

        <section id="projects">
            <hr>
            <h1>Projecten:</h1>
            <?php include("includes/projects.php");?>
        </section>
        
        <section id="contact">
            <hr>
            <h1>Contact:</h1>
            <?php include("includes/contact.php");?>
        </section>
    </body>
    <footer>

        <a class="link" href="https://github.com/Mem8or" target="_blank">
        <div class="linkcontent">
            <img src="./images/github.svg" class="icon" alt="GitHub Icon">
            <h2>Github</h2>
        </div>
        </a>

        <a class="link" href="includes/login.php" rel="nofollow">
            <h2>CMS</h2>
        </a>

    </footer>
</html>