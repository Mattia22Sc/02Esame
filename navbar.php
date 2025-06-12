<?php
//legge il contenuto del file json, convertendo la stringa in un array
$navbar = json_decode(file_get_contents("nav.json"), true);
// estrae il nome del file della pagina corrente
$current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/navbarmin.css">   
</head>
<body>
    <header>
        <hr>
        <nav class="navbar">
            <img src="img/logo-png.png" alt="">

            //* bottone nascosto che sarà visibile solamente nella modalità mobile
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                ☰
            </button>

            <ul class="navbar-menu">
            //* questo foreach prende i file dall'array navbar e prendiamo i dati che ci servono attraverso l'array creato
                <?php foreach ($navbar as $item): ?>
                <li class="<?= $item['link'] == $current ? 'active' : '' ?>">
                    <a href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <hr>
    </header>
</body>
</html>