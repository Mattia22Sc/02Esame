<?php
    include "navbar.php";
//legge il contenuto del file json, convertendo la stringa in un array
   $lavori = json_decode(file_get_contents("lavori.json"), true);
   $current = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $current ?></title>
    <link rel="stylesheet" href="css/lavoromin.css"> 
    <link rel="stylesheet" href="css/homemin.css"> 
</head>
<body>
    <div class="works">
        <h3>Privacy Policy</h3>
        <p>This privacy policy covers php.net and its associated mirrors.</p>
    </div>
    <div class="works">
        <h3>Email</h3>
        <p>We will not give away your email address to anyone, who is not related to the operations of php.net. We will also never ask you to send us any of your passwords via email.</p>
    </div>

    <div class="works">
        <h3>Logfiles</h3>
        <p>Most mirrors maintain standard logs of the requests that reach the web servers, but we do only use those files for statistical purposes. <br>
            And to improve your search experience, we store anonymised search terms that are submitted to the site.
        </p>
    </div>

    <div class="works">
        <h3>Cookies</h3>
        <p>php.net uses cookies to keep track of user preferences. Unless you login on the site, the cookies will not be used to store personal information, and we do not give away the information from the cookies.
            We also use self-hosted analytics service to improve popular sections of the documentation, and never share user data with third parties. You may deactivate or restrict the transmission of cookies by changing the settings of your web browser. Cookies that are already stored may be deleted at any time.
        </p>
    </div>

    <?php
        include "footer.php";
    ?>    
</body>
</html>