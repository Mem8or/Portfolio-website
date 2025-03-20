<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $to = 'gert.vantil@gmail.com';
    $subject = 'Website formulier contact';
    $headers = "From: " . $email . "\r\n" . "Reply-To: " . $email;
    $body = "Naam: $name\nEmail: $email\n\nMessage: \n$message";

    if(mail($to, $subject, $body, $headers)){
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }  
}
?>
<html>
    <form method="post">
        <label class="formrow" for="name">Naam: </label><br>
        <input class="formrow" type="text" name="name"><br>
        <label class="formrow" for="email">E-mail: </label><br>
        <input class="formrow" type="email" name="email"><br>
        <label class="formrow" for="message">Bericht: </label><br>
        <textarea class="formrow" name="message" id="message" rows="20" cols="50"></textarea><br>
        <input class="formrow" type="submit" id="submitbutton" value="Versturen">
    </form>
</html>