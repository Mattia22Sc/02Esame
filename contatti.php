<?php
// INCLUDI LA PAGINA NAVBAR.PHP
    include "navbar.php";

// RICHIAMI DALLA PAGINA UTILITY.PHP LA CLASSE MIE CLASSI E LA FUNZIONE SALVACONTATTO
    require_once __DIR__ . "/Utility.php";
    use MieClassi\Utility;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contatto = Utility::salvaContatto();
}

// messaggio se l'invio dei dati è andato a buon fine
    session_start();
if (isset($_SESSION['messaggio'])) {
    $classe = $_SESSION['tipo'] == 'successo' ? 'messaggio-successo' : 'messaggio-errore';
    echo '<p class="' . $classe . '">' . $_SESSION['messaggio'] . '</p>';

// Rimuovi il messaggio dalla sessione al reload della pagina
    unset($_SESSION['messaggio']);
    unset($_SESSION['tipo']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/contattimin.css">  
</head>
<body>
     <div class=" cards_contatti">
        <h1>I MIEI CONTATTI</h1>   
        <div class="contacts">
            <div class="maps">
                <h3>La nostra Sede:</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.317567898302!2d13.972875476384122!3d37.47683172926616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1310ea709b6e889b%3A0xe2ff2fb9e8ab8!2sVia%20Aldo%20Moro%2C%20Libero%20consorzio%20comunale%20di%20Caltanissetta!5e0!3m2!1sit!2sit!4v1742322324290!5m2!1sit!2sit" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
            <div class="forms">
                <h3>Il nostro Form :</h3>
                <form class="form" method="post" action =contatti.php>
                    <fieldset>
                        <legend>Compila i seguenti Campi</legend>
                        <label >Nome :</label>
                        <input type="text" name="nome" required placeholder="Inserisci il tuo nome" required>
                        <label>Cognome :</label>
                        <input type="text" name="cognome" required placeholder="Inserisci il tuo cognome" required>
                        <label>E-Mail :</label>
                        <input type="email" name="email" required placeholder="Inserisci la tua E-Mail" required>
                        <label>Seleziona l'argometo :</label>
                        <select name="argomento">
                            <option value="informazioni">Informazioni</option>
                            <option value="assistenza">Assistenza</option>
                            <option value="altro">Altro</option>
                        </select>
                        <textarea name="messaggio" required placeholder="Scrivi il tuo messaggio..."></textarea>
                        <button class="button" type="submit">Invia</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    include "footer.php";
?>