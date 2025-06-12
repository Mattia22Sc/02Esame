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
            $_SESSION['messaggio'] = ' <p class = "messaggio"> Messaggio inviato con successo! </p>';
            $_SESSION['tipo'] = 'successo';

            // Redirect per pulire il POST
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;

        }   else {
                session_start();
                $_SESSION['messaggio'] = 'Errore: tutti i campi sono obbligatori.';
                $_SESSION['tipo'] = 'errore';
                
                 // Redirect per pulire il POST
                header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
    }
    }
}