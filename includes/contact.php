<?php
    $errors = '';
    $name = '';
    $email = '';
    $message = '';
    $sname = '';
    $semail = '';
    $smessage = '';

    $mysqli = new mysqli("localhost", "GertvanTil", "gert2002", "portfolio-website");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
        if (isset($_POST['submit'])){
            if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message'])){

                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
                $tad = date('Y-m-d H:i:s');

                $stmt = $mysqli->prepare("INSERT INTO messages (name, email, message, tad) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $name, $email, $message, $tad);
        
                if ($stmt->execute()) {
                    $errors = '<h3 class="green">- Bericht verzonden!</h3>';
                } else {
                    $errors = '<h3 class="red">- Er was een probleem met uw bericht versturen!</h3><br>' . $stmt->error;
                }

                $stmt->close();
                $dbh->close();
        }
        else {
            $sname = htmlspecialchars($_POST['name']);
            $semail = htmlspecialchars($_POST['email']);
            $smessage = htmlspecialchars($_POST['message']);
            if(empty($_POST['name'])){
                $errors .= '<h3 class="red">- Naam is niet ingevuld!</h3><br>';
            }
            if(empty($_POST['email'])){
                $errors .= '<h3 class="red">- Email is niet ingevuld!</h3><br>';
            }
            if(empty($_POST['message'])){
                $errors .= '<h3 class="red">- Bericht niet ingevuld!</h3><br>';
            }
        }


    }
?>
<html>
    <form action="#contact" method="post">
        <label class="formrow" for="name">Naam: </label><br>
        <input class="formrow" type="text" name="name" value="<?= $sname?>"><br>
        <label class="formrow" for="email">E-mail: </label><br>
        <input class="formrow" type="email" name="email" value="<?= $semail?>"><br>
        <label class="formrow" for="message">Bericht: </label><br>
        <textarea class="formrow" name="message" id="message" rows="20" cols="50"><?= $smessage?></textarea><br>
        <input class="formrow" name="submit" type="submit" id="submitbutton" value="Versturen" >
        <?= $errors?>
    </form>
</html>