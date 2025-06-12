<?php
//legge il contenuto del file json, convertendo la stringa in un array
$footer = json_decode(file_get_contents("footer.json"), true);

// estrae il nome del file della pagina corrente
$current = basename($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/footermin.css">
</head>
<body>
    <footer class="footer">
        <img src="img/logo-png.png" alt="">
        <p>AM DEVELOPOR <br> Via Aldo Moro,7 <br> San Cataldo (CL)</p>
        <a href="privacypolicy.php"><p>Privacy Policy</p></a>
        <ul>
            <?php for ($i = 0; $i < count($footer); $i++): ?>
                <?php $current_footer = $footer[$i]?>
                <li class="<?= $current_footer['title'] == $current ? 'active' : ''  ?>" >
                    <a href="<?= $current_footer['link'] ?>"><img id="icons" src="<?= $current_footer['src'] ?>" alt=""></a>
                </li>
            <?php endfor; ?>
        </ul>
</footer>  
</body>
</html>
      
       
