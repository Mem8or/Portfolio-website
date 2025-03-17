<html>
    <head>
        <title>Portfolio</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/script.js"></script>
    </head>
    <body>
        <nav id="menu">
            menu here
        </nav>
        <section id="intro">
            <h1>Introductie</h1>
            <img id="portrait" src="images/portrait.jpg" alt="Portrait">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra odio sit amet euismod cursus. Donec eros enim, viverra sed bibendum eu, dictum non ante. Cras at tortor erat. Quisque ut augue in dui tempor pharetra. Integer a urna neque. Proin lobortis nibh ut volutpat rhoncus. Sed gravida nunc vitae massa pellentesque vulputate. Vivamus bibendum orci lorem, nec bibendum mauris dictum at. Donec vel mi ligula. Fusce fermentum, purus in rutrum ultrices, tortor velit malesuada sem, et lobortis magna urna et est. Maecenas ac iaculis magna. Morbi vulputate, tortor tincidunt rhoncus aliquam, libero justo pharetra quam, ac vulputate sapien lorem in neque. Vestibulum dapibus luctus eros, a congue sapien molestie vitae.
                Mauris fringilla suscipit faucibus. Maecenas felis lorem, tempus non fermentum non, tincidunt vel magna. Duis viverra faucibus semper. Nulla gravida mauris id urna dignissim semper. Proin eleifend sed risus quis fringilla. Nullam nec dictum elit. Nulla feugiat eleifend leo at suscipit. Integer sit amet libero sit amet risus scelerisque rhoncus. Praesent quis auctor massa. Sed commodo aliquet ipsum lacinia molestie. Vestibulum vel accumsan ipsum, porta pulvinar est. Etiam lacus tortor, pulvinar id venenatis id, sollicitudin a erat.
                Duis lacinia, mi a feugiat varius, lorem nisi feugiat magna, id vulputate diam nisl mollis ex. Sed commodo dolor massa, quis sodales lacus pretium at. Etiam ante massa, tempor et porttitor ut, porta a odio. Nullam et sodales magna. Curabitur eget magna dapibus dolor fringilla fermentum vitae molestie turpis. Nullam tincidunt cursus massa id imperdiet. Duis et libero non magna maximus porta eu vestibulum purus. In elementum lectus fermentum lectus aliquam, sed dapibus ipsum fringilla. Donec a accumsan erat, vel rhoncus odio. Maecenas rhoncus pharetra est, ut rhoncus ante scelerisque in.
                Mauris suscipit mollis tellus, sit amet sollicitudin odio dapibus id. Duis consectetur tempor dolor vel congue. Praesent vel egestas augue. Cras vitae felis ut magna molestie viverra in at nisl. Vivamus sollicitudin lorem tortor, in aliquet enim hendrerit quis. Mauris vehicula purus et faucibus blandit. Mauris consectetur, nisl in eleifend cursus, arcu sem iaculis enim, eu laoreet lorem felis ultrices mi. Fusce viverra quis sapien nec congue.
                Vestibulum bibendum mollis libero eget fringilla. Integer sagittis vulputate sapien. Etiam bibendum ultrices lorem at convallis. Praesent dapibus at libero in mollis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc lacus dolor, elementum vel congue vitae, venenatis id ipsum. Suspendisse elementum ullamcorper massa vitae molestie. Maecenas interdum enim nec eros gravida gravida. Praesent ornare vel elit ut lobortis. Morbi a vestibulum dui, cursus blandit ex. Cras libero turpis, ullamcorper et ligula in, semper aliquam tellus. Pellentesque maximus maximus tincidunt. Phasellus at turpis id ante faucibus dapibus hendrerit non mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce vehicula egestas tincidunt.
            </p>
            
        </section>
        <section id="projects">
            <?php include("./includes/projects.php");?>
        </section>
        <section id="contact">
            <form method="post">
                <label for="name">Naam: </label> <br>
                <input type="text" name="name"> <br>
                <label for="email">E-mail: </label> <br>
                <input type="email" name="email"> <br>
                <label for="message">Bericht: </label> <br>
                <textarea name="message" id="message" rows="20" cols="50"></textarea><br>
                <input type="submit">
            </form>
        </section>
    </body>
    <footer>
        footer
        <a href="includes/login.php"> link </a>
    </footer>
</html>