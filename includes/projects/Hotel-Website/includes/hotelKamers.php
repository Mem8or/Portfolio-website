<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
require __DIR__ . '/../vendor/autoload.php';

$title = 'Kamers';

$kamers = json_decode(file_get_contents('./kamers.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['roomdata'])) {
    $updated_kamers = [];

    foreach ($kamers as $originalRoom) {
        $key = str_replace(' ', '', $originalRoom['naam']);

        if (isset($_POST['roomdata'][$key])) {
            $roomData = $_POST['roomdata'][$key];
            $mergedRoom = array_merge($originalRoom, $roomData);
            $updated_kamers[] = $mergedRoom;
        } else {
            $updated_kamers[] = $originalRoom;
        }
    }

    file_put_contents('./kamers.json', json_encode($updated_kamers, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    $kamers = $updated_kamers;
}

function sendmail($room){

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'gert.vantil@gmail.com';
    $mail->Password = 'vvdr gwld fnco putt';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('gert.vantil@gmail.com', 'Gert');
    $mail->addAddress('Gert.vantil@gmail.com', 'Gert');
    $mail->Subject = 'Booked Room';
    $mail->Body = 'This is a test email sent via Gmail SMTP and PHPMailer. Room '. $room['naam'] .' is geboekt.';

    if (!$mail->send()) {
        echo 'Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Email sent!';
    }
}

function Generate_rooms(array $rooms) {
if (!isset($_SESSION['form_hidden'])) {
    $_SESSION['form_hidden'] = !($_SESSION['loggedin'] ?? false);
}

   if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit;
   }

    if (isset($_POST['login'])) {
        if ($_POST['user'] === 'admin' && $_POST['pass'] === 'pass123') {
            $_SESSION['loggedin'] = true;
            $_SESSION['form_hidden'] = false;
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }
    }

    $activeClass = $_SESSION['form_hidden'] ? 'hideform' : '';
    $output = '<section class="kamerswrapper">';

    foreach ($rooms as $room) {
        $roomKey = str_replace(' ', '', $room['naam']);
        if (isset($_POST[$roomKey])) {
            sendmail($room);
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit;
        }

        $output .= '
        <section class="kamereditrow">
            <style>
                #' . $roomKey . ' {
                    background-image: url(http://localhost/Projects/ICT-VM/Hotel-Website/images/' . htmlspecialchars($room['img']) . ');
                }
            </style>

            <article class="kamerarticle ' . $activeClass . '" id="' . $roomKey . '">
                <section class="info">
                    <p class="mediumtext">Prijs per nacht: € ' . htmlspecialchars($room['prijs']) . '</p>
                    <p class="mediumtext">Beschikbare kamers: ' . htmlspecialchars($room['beschikbaarheid']) . '</p>
                </section>
                <section class="row">
                    <section class="column">
                        <p class="largetext">' . htmlspecialchars($room['naam']) . '</p>
                        <p class="mediumtext">' . htmlspecialchars($room['desc']) . '</p>
                    </section>
                </section>
                <form method="post">
                    <input type="submit" name="' . $roomKey . '" value="Boek kamer">
                </form>
            </article>

            <article class="kamereditform ' . $activeClass . '">
                <form method="post">';
        
        foreach ($room as $field => $value) {
            $escapedValue = htmlspecialchars($value);
            $output .= '<label>' . htmlspecialchars($field) . '</label>';

            if ($field === 'desc') {
                $output .= '<textarea name="roomdata[' . $roomKey . '][' . $field . ']">' . $escapedValue . '</textarea>';
            } else {
                $output .= '<input type="text" name="roomdata[' . $roomKey . '][' . $field . ']" value="' . $escapedValue . '">';
            }
        }

        $output .= '
                    <input class="clickable" type="submit" name="pushchange' . $roomKey . '" value="Verander ' . htmlspecialchars($room['naam']) . '">
                </form>
            </article>
        </section>';
    }

    $output .= '</section>';
    return $output;
}

$body = <<<HTML
<form id="Kameredit" method="post">
HTML;

if (empty($_SESSION['loggedin'])) {
    $body .= <<<HTML
    <input class="input" type="text" name="user">
    <input class="input" type="password" name="pass">
    <input class="input" name="login" type="submit" value="Login">
HTML;
} else {
    $body .= '<input class="input" name="logout" type="submit" value="Logout">';
}

$body .= '</form>';

$body .= Generate_rooms($kamers);
?>