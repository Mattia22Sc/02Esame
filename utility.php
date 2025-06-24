<?php
namespace MieClassi;

class Utility{
    public static function salvaContatto(){
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        // Eliminare Html dalle stringhe nome, argomento, messaggio
        $nome = strip_tags($_POST['nome']);
        $cognome = strip_tags($_POST['cognome']);
        $argomento = strip_tags($_POST['argomento']);
        $messaggio = strip_tags($_POST['messaggio']);

        //Controllo che tutti i campi siano stati compilati correttamente
        if ($email && $nome && $cognome && $argomento && $messaggio) {
            $riga = "$nome | $cognome | $email | $argomento | $messaggio\n";
            //Scrive i dati in un file di testo dati/contatti.txt.

            //Restituisce un messaggio di conferma o errore.
            file_put_contents("dati/contatti.json", $riga, FILE_APPEND);
           session_start();
            $_SESSION['messaggio'] = ' Messaggio inviato con successo! ';
            $_SESSION['tipo'] = 'successo';

            // Redirect per pulire il POST
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;

        }   else {
                session_start();
                $_SESSION['messaggio'] = 'Errore: tutti i campi sono obbligatori.';
                $_SESSION['tipo'] = 'errore';
                
            exit;
    }
    }

      public static function printNavbar() {
        $navbar = json_decode(file_get_contents(__DIR__ . "/nav.json"), true);
        $current = basename($_SERVER['PHP_SELF']);
        ?>
        <link rel="stylesheet" href="css/navbarmin.css">
        <header>
            <hr>
            <nav class="navbar">
                <img src="img/logo-png.png" alt="">
                     <!-- input checkbox nascosto -->
                <input type="checkbox" id="nav-toggle" class="nav-toggle">

                    <!-- label come icona del menu -->
                <label for="nav-toggle" class="navbar-toggler" aria-label="Toggle navigation">☰</label>
                <ul class="navbar-menu">
                    <?php foreach ($navbar as $item): ?>
                        <li class="<?= $item['link'] == $current ? 'active' : '' ?>">
                            <a title="<?= $item['title'] ?>" href="<?= $item['link'] ?>"><?= $item['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <hr>
        </header>
        <?php
    }

       public static function printFooter() {
       $footer = json_decode(file_get_contents(__DIR__ . "/footer.json"), true);
        $current = basename($_SERVER['PHP_SELF']);
        ?>
        <link rel="stylesheet" href="css/footermin.css">
        <footer class="footer">
            <img src="img/logo-png.png" alt="">
            <p>AM DEVELOPOR <br> Via Aldo Moro,7 <br> San Cataldo (CL)</p>
            <a title="Privacy Policy" href="privacypolicy.php"><p>Privacy Policy</p></a>
            <ul>
                <?php foreach ($footer as $current_footer): ?>
                    <li class="<?= $current_footer['title'] == $current ? 'active' : '' ?>">
                        <a title="<?= $current_footer['link'] ?>" href="<?= $current_footer['link'] ?>">
                            <img id="icons" src="<?= $current_footer['src'] ?>" alt="">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </footer>
        <?php
    }

}