<?php
    $messages = [];
    $errors = '';
    $setName = '';
    $setEmail = '';
    $setMessage = '';

    $mysqli = new mysqli("localhost", "GertvanTil", "gert2002", "portfolio-website");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    
        if (isset($_POST['submit'])){
            if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['message'])){
                //wanneer de form ingevuld is word de data toegevoegd aan $messages voor verwerking in de cms
            $message[] = ['name' => htmlspecialchars($_POST['name']), 'email' => htmlspecialchars($_POST['email']), 'message' => htmlspecialchars($_POST['message']), 'tad' => date('D-m-y H:i:s')];
            $errors = '<h3 class="green">- Bericht verzonden!</h3>';
        }
        else {
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
        $setName = htmlspecialchars($_POST['name']);
        $setEmail = htmlspecialchars($_POST['email']);
        $setMessage = htmlspecialchars($_POST['message']);
    }
?>
<html>
    <form action="#contact" method="post">
        <label class="formrow" for="name">Naam: </label><br>
        <input class="formrow" type="text" name="name" value="<?= $setName?>"><br>
        <label class="formrow" for="email">E-mail: </label><br>
        <input class="formrow" type="email" name="email" value="<?= $setEmail?>"><br>
        <label class="formrow" for="message">Bericht: </label><br>
        <textarea class="formrow" name="message" id="message" rows="20" cols="50"><?= $setMessage?></textarea><br>
        <input class="formrow" name="submit" type="submit" id="submitbutton" value="Versturen" >
        <?= $errors?>
    </form>
</html>