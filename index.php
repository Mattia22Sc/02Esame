<?php
    include "navbar.php";
//legge il contenuto del file json, convertendo la stringa in un array
   $lavori = json_decode(file_get_contents("lavori.json"), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/homemin.css">   
</head>
<body>
    <div class="card">
        <div class="card_img">
            <img src="./img/ai-generated-8918637_640.jpg" alt="">       
        </div>
        <div class="descrption">
            <h1>LA MIA DESCRIZIONE</h1>
            <p>Io sono Mattia Anzalone, programmatore e web designer.</p>
            <p>Il mio lavoro consiste nel realizzare siti internet per la vostra attività ed essere posizionato sui motori di ricerca. Inoltre analizzo e sviluppo il progetto venendo incontro ai reali bisogni del cliente.</p>
            <p>La mia sede operativa si trova in centro a San Cataldo, ma lavoro con attività e clienti sparsi per tutta Italia. Contattami per una consulenza e per definire una proposta personalizzata per le tue necessità.</p>
        </div>
    </div>    
    <div class="works">
        <div class="title_works">
            <h1>I MIEI LAVORI</h1>
        </div> 
        <div class="card_works">
            //*CICLO FOR CHE RICHIAMA DAL FILE LAVORI.JSON I LAVORI E STAMPA IL RISULTATO NEL DIV WORK */
            <?php for ($i = 0; $i < count($lavori); $i++): ?>
            <?php $lavoro = $lavori[$i]?>
            <div class="work">
                <a href="<?php echo $lavoro['href']?>">
                    <h2>
                        <?php echo $lavoro['title'] ?>
                    </h2>
                    <img src= "<?php echo $lavoro['src']?>"  alt="">
                </a>
                
            </div>
            <?php endfor ?>
        </div>
    </div>
    <?php
    include "footer.php"
    ?>
</body>
</html>