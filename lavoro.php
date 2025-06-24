<?php
   include "utility.php";
    use MieClassi\Utility;

// Prende i parametri dalla URL
$categoria = $_GET['categoria'] ?? null;
$id = $_GET['id'] ?? null;

// Controlla parametri
if ($categoria === null || $id === null || !is_numeric($id)) {
    echo "Dati non validi.";
    exit;
}

// Carica il file giusto
switch ($categoria) {
    case 'html':
        $lavori = json_decode(file_get_contents("lavorihtml.json"), true);
        break;
    case 'css':
        $lavori = json_decode(file_get_contents("lavoricss.json"), true);
        break;
    case 'php':
        $lavori = json_decode(file_get_contents("lavoriphp.json"), true);
        break;
    case 'javascript':
        $lavori = json_decode(file_get_contents("lavorijavascript.json"), true);
        break;
    default:
        echo "Categoria non valida.";
        exit;
}

// Verifica se esiste il lavoro con quell'id
if (!isset($lavori[$id])) {
    echo "Lavoro non trovato.";
    exit;
}

// Recupera il lavoro
$lavoro = $lavori[$id];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($lavoro['title']); ?></title>
    <link rel="stylesheet" href="css/lavoromin.css">
    <link rel="stylesheet" href="css/homemin.css">
</head>
<body>
    <nav>
        <?php Utility::printNavbar(); ?>
    </nav>
    <div class="card">
        <div class="card_img">
           <img src="<?php echo htmlspecialchars($lavoro['src']); ?>" alt="Immagine di <?php echo htmlspecialchars($lavoro['title']); ?>">     
        </div>
        <div class="descrption">
            <!--QUA VIENE FATTA UN INTERROGAZIONE SE è PRESENTE NEL SINGOLO LAVORO LA DESCRIZIONE, SE è PRESENTE VIENE RIPORTATA ALTRIMENTI IL MESSAGGIO SARA'  DESCRIZIONE NON disponibile-->
            <h1><?php echo htmlspecialchars($lavoro['title']); ?></h1>
            <p><?php echo htmlspecialchars($lavoro['descrizione'] ?? 'Descrizione non disponibile'); ?></p>
            <p><?php echo htmlspecialchars($lavoro['descrizione'] ?? 'Descrizione non disponibile'); ?></p>
            <p><?php echo htmlspecialchars($lavoro['descrizione'] ?? 'Descrizione non disponibile'); ?></p>
            <p><?php echo htmlspecialchars($lavoro['descrizione'] ?? 'Descrizione non disponibile'); ?></p>
            <p><?php echo htmlspecialchars($lavoro['descrizione'] ?? 'Descrizione non disponibile'); ?></p>
            <!--QUESTO BOTTONE CI RIPORTA ALLA LISTA DEI LAVORI-->
            <button class="button"><a title="Lavori" href="lavori.php">← Torna ai lavori</a> </button>
        </div>
    </div> 
    <footer>
         <?php Utility::printFooter(); ?>
    </footer>
</body>
</html>