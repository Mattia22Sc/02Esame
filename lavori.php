<?php
// IN QUESTE FUNZIONI VENGONO CREATI DEGLI ARRAY ASSOCIATIVI IN BASE AL FILE JSON RICHIAMATO
    include "navbar.php";
    $lavorihtml= json_decode(file_get_contents("lavorihtml.json"), true);
    $lavoricss= json_decode(file_get_contents("lavoricss.json"), true);
    $lavoriphp= json_decode(file_get_contents("lavoriphp.json"), true);
    $lavoriscript= json_decode(file_get_contents("lavorijavascript.json"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/lavorimin.css">
</head>
<body>
    <div class="works">
        <div class="title_works">
            <h1>I MIEI LAVORI IN HTML</h1>
        </div> 
        <div class="card_works">
            
            //*CICLO FOR CHE RICHIAMA DAI VARI FILE JSON I LAVORI E STAMPA IL RISULTATO NELL'URL DOVE VIENE SPECIFICATO LA CATEGORIA E IL TITOLO, VIENE APERTA LA PAGINA DEL SINGOLO LAVORO */
            <?php for ($i = 0; $i < count($lavorihtml); $i++): ?>
            <?php $lavoro = $lavorihtml[$i]?>
            <div class="work">
                <a href="lavoro.php?categoria=html&id=<?php echo $i ?>">
                    <h2><?php echo $lavoro['title']; ?></h2>
                    <img src="<?php echo $lavoro['src'] ?>" alt="">
                </a>    
            </div>
            <?php endfor ?>
        </div>
    </div>
    <div class="works">
        <div class="title_works">
            <h1>I MIEI LAVORI IN CSS</h1>
        </div> 
        <div class="card_works">
            //*CICLO FOR CHE RICHIAMA DAI VARI FILE JSON I LAVORI E STAMPA IL RISULTATO NELL'URL DOVE VIENE SPECIFICATO LA CATEGORIA E IL TITOLO, VIENE APERTA LA PAGINA DEL SINGOLO LAVORO */
            <?php for ($i = 0; $i < count($lavoricss); $i++): ?>
            <?php $lavoro = $lavoricss[$i]?>
            <div class="work">
                <a href="lavoro.php?categoria=css&id=<?php echo $i ?>">
                    <h2><?php echo $lavoro['title']; ?></h2>
                    <img src="<?php echo $lavoro['src'] ?>" alt="">
                </a>    
            </div>
            <?php endfor?>
        </div>
    </div>
    <div class="works">
        <div class="title_works">
            <h1>I MIEI LAVORI IN PHP</h1>
        </div> 
        <div class="card_works">
            //*CICLO FOR CHE RICHIAMA DAI VARI FILE JSON I LAVORI E STAMPA IL RISULTATO NELL'URL DOVE VIENE SPECIFICATO LA CATEGORIA E IL TITOLO, VIENE APERTA LA PAGINA DEL SINGOLO LAVORO */
            <?php for ($i = 0; $i < count($lavoriphp); $i++): ?>
            <?php $lavoro = $lavoriphp[$i]?>
            <div class="work">
                <a href="lavoro.php?categoria=php&id=<?php echo $i ?>">
                    <h2><?php echo $lavoro['title']; ?></h2>
                    <img src="<?php echo $lavoro['src'] ?>" alt="">
                </a>
            </div>
            <?php endfor?>
        </div>
    </div>
    <div class="works">
        <div class="title_works">
            <h1>I MIEI LAVORI IN JAVASCRIPT</h1>
        </div> 
        <div class="card_works">
            //*CICLO FOR CHE RICHIAMA DAI VARI FILE JSON I LAVORI E STAMPA IL RISULTATO NELL'URL DOVE VIENE SPECIFICATO LA CATEGORIA E IL TITOLO, VIENE APERTA LA PAGINA DEL SINGOLO LAVORO */
            <?php for ($i = 0; $i < count($lavoriscript); $i++): ?>
            <?php $lavoro = $lavoriscript[$i]?>
            <div class="work">
                <a href="lavoro.php?categoria=javascript&id=<?php echo $i ?>">
                    <h2><?php echo $lavoro['title']; ?></h2>
                    <img src="<?php echo $lavoro['src']?>" alt="">
                </a>
            </div>
            <?php endfor?>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
</html>
