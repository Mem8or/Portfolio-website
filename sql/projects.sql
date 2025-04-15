CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(255) NOT NULL,
    imageAlt VARCHAR(100) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    content TEXT NOT NULL
);

CREATE TABLE project_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    project_id INT NOT NULL,
    link VARCHAR(255) NOT NULL,
    FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE
);


-- Project 1
INSERT INTO projects (image, imageAlt, title, description, content)
VALUES (
    'images/php.svg',
    'projectImage',
    'PHP Adresbalk opdracht:',
    'Een opdracht over adresbalken van mijn codecrashers opleiding.',
    'In deze opdracht heb ik de webpagina opnieuw geschreven zodat op basis van de zoekbalk verschillende pagina\'s worden ingeladen als data. Hiermee is het ook mogelijk om specifiek de pagina aan te duiden zonder bestandtypes.'
);
INSERT INTO project_links (project_id, link) VALUES (1, 'php Adresbalk/index.php');

-- Project 2
INSERT INTO projects (image, imageAlt, title, description, content)
VALUES (
    'images/php.svg',
    'projectImage',
    'PHP Functies opdracht:',
    'Een opdracht over PHP functies van mijn codecrashers opleiding.',
    'In deze opdracht Heb ik geleeerd hoe elementen dynamisch gegenereerd kunnen worden. Dit is niet alleen handig voor text maar kan ook gebruikt worden om hele delen van een website op te bouwen zoals deze uitklapbare elementen.'
);
INSERT INTO project_links (project_id, link) VALUES (2, 'php Functies/index.php');

-- Project 3
INSERT INTO projects (image, imageAlt, title, description, content)
VALUES (
    'images/css.svg',
    'projectImage',
    'CSS Opdracht:',
    'Een opdracht over media queries van mijn codecrashers opleiding.',
    'In deze opdracht heb ik een website gemaakt die van stijl veranderd gebaseerd op het formaat van het scherm (computer of telefoon). Dit is erg belangrijk voor de bruikbaarheid van de website op veel verschillende apparaten. (deze website checkt hier wel voor maar is niet gestyled voor desktop)'
);
INSERT INTO project_links (project_id, link) VALUES (3, 'CSS/index.html');

-- Project 4
INSERT INTO projects (image, imageAlt, title, description, content)
VALUES (
    'images/js.svg',
    'projectImage',
    'JAVASCRIPT Fetch api:',
    'Opdrachten over javascript fetch van mijn codecrashers opleiding.',
    'In deze opdrachten heb ik geleerd om javascript fetch en AJAX te schrijven en toe te passen. Dit wordt gebruikt om de pagina aan te passen zonder het te herladen, AJAX is een ouder alternatief van fetch maar wordt nog wel gebruikt op oudere websites.'
);
INSERT INTO project_links (project_id, link) VALUES (4, 'JS Fetch/index.html');

-- Project 5
INSERT INTO projects (image, imageAlt, title, description, content)
VALUES (
    'images/js.svg',
    'projectImage',
    'JAVASCRIPT Functies:',
    'Opdracten over javascript functies van mijn codecrashers opleiding.',
    'In deze opdrachten heb ik geleerd om javascript functies te schrijven en toe te passen. Dit wordt gebruikt om berekeningen en functionaliteit toe te voegen aan websites.'
);
INSERT INTO project_links (project_id, link) VALUES (5, 'JS Functies1/index.html');
INSERT INTO project_links (project_id, link) VALUES (5, 'JS Functies2/index.html');
