<?php
    $title = 'Contact';
    $body = <<<HTML

    <section id="contactcontainer">
        <article>
            <p class="largetext">Stuur ons een bericht:</p>
            <form method="post">
                <hr>
                <label for="name" class="mediumtext">Naam:</label>
                <input type="text" name="name">
                <hr>
                <label for="email" class="mediumtext">Email:</label>
                <input type="text" name="email">
                <hr>
                <label for="message" class="mediumtext">Bericht:</label>
                <textarea name="message"></textarea>
                <input type="submit" value="Bericht versturen" class="submitbutton">
            </form>
        </article> 
        <article>
            <form>
            <p class="largetext">Neem contact met ons op:</p>
            <hr>
            <p class="mediumtext">Ons Adres:</p>
            <p class="mediumtext">1234 Zonnestraat 1234AB Alkmaar Noord-Holland</p>
            <hr>
            <p class="mediumtext">Ons Telefoonnummer:</p>
            <p class="mediumtext">555-123-4567</p>
            <hr>
            <p class="mediumtext">Ons E-mail adres:</p>
            <p class="mediumtext">test@zonnevallei.hotel.com</p>
            </form>
        </article> 
    </section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1450.7539622466263!2d4.743830402361123!3d52.64332344853511!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2snl!4v1748865157534!5m2!1sen!2snl" width="100%" height="450" style="border-bottom: 5px solid white; border-top: 5px solid white;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>

    HTML;

?>