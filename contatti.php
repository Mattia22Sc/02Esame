<?php
include "utility.php";
use MieClassi\Utility;

session_start();

$messaggio = $_SESSION['messaggio'] ?? null;
$tipo = $_SESSION['tipo'] ?? null;
unset($_SESSION['messaggio'], $_SESSION['tipo']);

$errors = [];
$values = ['nome'=>'', 'cognome'=>'', 'email'=>'', 'argomento'=>'', 'messaggio'=>''];

if ($_SERVER['REQUEST_METHOD']==='POST') {
    // Pulisci i dati
    foreach ($values as $field => $v) {
        $values[$field] = trim($_POST[$field] ?? '');
    }

    // Valida
    if ($values['nome']==='') $errors['nome'] = "Il nome è obbligatorio.";
    if ($values['cognome']==='') $errors['cognome'] = "Il cognome è obbligatorio.";
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = "Email non valida.";
    if ($values['messaggio']==='') $errors['messaggio'] = "Scrivi un messaggio.";


    // Se tutto ok → salva e reindirizza
    if (empty($errors)) {
        $contatto = Utility::salvaContatto();
        header('Location: contatti.php'); 
        exit;
    }
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
    <nav>
         <?php Utility::printNavbar(); ?>
    </nav>
     <div class=" cards_contatti">
        <h1>I MIEI CONTATTI</h1>   
        <div class="contacts">
            <div class="maps">
                <h3>La nostra Sede:</h3>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3166.317567898302!2d13.972875476384122!3d37.47683172926616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1310ea709b6e889b%3A0xe2ff2fb9e8ab8!2sVia%20Aldo%20Moro%2C%20Libero%20consorzio%20comunale%20di%20Caltanissetta!5e0!3m2!1sit!2sit!4v1742322324290!5m2!1sit!2sit" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
            <div class="forms">
                <?php if ($messaggio): ?>
                    <div class="alert <?= htmlspecialchars($tipo) ?>">
                        <?= htmlspecialchars($messaggio) ?>
                    </div>
                <?php endif; ?>
                <h3>Il nostro Form :</h3>
                <form class="form " method="post" action="contatti.php" novalidate>
                    <fieldset>
                        <legend>Compila i seguenti Campi</legend>

                        <label>Nome :</label>
                        <span class="error-text "><?= $errors['nome'] ?? '' ?></span>
                        <input type="text" name="nome" value="<?= htmlspecialchars($values['nome']) ?>" class="<?= isset($errors['nome'])?'error':'' ?>" placeholder="Inserisci il tuo nome">
                        

                        <label>Cognome :</label>
                        <span class="error-text "><?= $errors['cognome'] ?? '' ?></span>
                        <input type="text" name="cognome" value="<?= htmlspecialchars($values['cognome']) ?>" class="<?= isset($errors['cognome'])?'error':'' ?>" placeholder="Inserisci il tuo cognome">
                       

                        <label>E-Mail :</label>
                        <span class="error-text "><?= $errors['email'] ?? '' ?></span>
                        <input type="email" name="email" value="<?= htmlspecialchars($values['email']) ?>" class="<?= isset($errors['email'])?'error':'' ?>" placeholder="Inserisci la tua E-Mail">
                       

                        <label>Seleziona l'argomento :</label>
                        <select name="argomento" class="<?= isset($errors['argomento'])?'error':'' ?>">
                            <option value="informazioni" <?= $values['argomento']==='informazioni'?'selected':'' ?>>Informazioni</option>
                            <option value="assistenza" <?= $values['argomento']==='assistenza'?'selected':'' ?>>Assistenza</option>
                            <option value="altro" <?= $values['argomento']==='altro'?'selected':'' ?>>Altro</option>
                        </select>

                        <label>Messaggio :</label>
                        <span class="error-text "><?= $errors['messaggio'] ?? '' ?></span>
                        <textarea name="messaggio" class="<?= isset($errors['messaggio'])?'error':'' ?>" placeholder="Scrivi il tuo messaggio..."><?= htmlspecialchars($values['messaggio']) ?></textarea>
                        

                        <button class="button" type="submit">Invia</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <?php Utility::printFooter(); ?>
    </footer>
</body>
</html>
