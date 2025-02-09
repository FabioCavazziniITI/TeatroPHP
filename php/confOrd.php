<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/");
        header("Location: ../login.php");
        exit;
    }

    if (!isset($_SESSION["active_login"])) {
        header("Location: ../login.php");
        exit;
    }

    // Recupera i valori dalla sessione
    $nome = $_SESSION['nome'];
    $cognome = $_SESSION['cognome'];
    $email = $_SESSION['email'];
    $cellulare = $_SESSION['cellulare'];
    $nPosti = $_SESSION['nPosti'];
    $nPostiTOT = $_SESSION['nPostiTOT'];
    $costoTOT = $_SESSION['costoTOT'];

    // Controlla se il cookie è impostato
    if (isset($_COOKIE["NomeUtente"])) {
        $user = $_COOKIE["NomeUtente"];
    } else {
        $user = "Utente non identificato";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <link rel="stylesheet" type="text/css" href="../css/cssPage.css" media="all">
        <title>
            Teatro Comunale Ferrara
        </title>
    </head>
    <body>
        <div class="contenitorePHP">
            <b>
                <?php
                    function generaNumeroSicuro($min, $max) {
                        return random_int($min, $max);
                    }
                    
                    $numeroSicuro = generaNumeroSicuro(1, 10000);
                    echo ("CONFERMA ORDINE N&deg; ".$numeroSicuro);
                ?>
            </b><br><br>
            <?php                
                //saluto utente
                echo ("Gentile ".$nome." ".$cognome.",<br>
                        l'ordine da lei effettuato è avvenuto con successo!<br><br>
                        Di seguito può trovare i dettagli dell'ordine:<br>");
            ?>
            <table class="table1">
                <tr>
                    <th colspan="4">
                        D E T T A G L I&emsp;&emsp;&emsp;O R D I N E
                    </th>
                </tr>
                <tr>
                    <th>
                        Numero Ordine
                    </th>
                    <th>
                        Data e Ora
                    </th>
                    <th>
                        Numero biglietti
                    </th>
                    <th>
                       Spesa
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo ($numeroSicuro);
                        ?>
                    </td>
                    <td>
                        <?php
                            date_default_timezone_set("Europe/Rome");
                            echo date("d-m-Y H:i:s");
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($nPostiTOT." biglietti");
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ("€ ".$costoTOT);
                        ?>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">
                        D A T I&emsp;&emsp;&emsp;A N A G R A F I C I
                    </th>
                </tr>
                <tr>
                    <th>
                        Nominativo
                    </th>
                    <th>
                        Indirizzo email
                    </th>
                    <th>
                        Numero di telefono
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php
                            echo ($nome. " " .$cognome);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($email);
                        ?>
                    </td>
                    <td>
                        <?php
                            echo ($cellulare);
                        ?>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <th colspan="3">
                        B I G L I E T T I
                    </th>
                </tr>
                <tr>
                    <th>
                        Zona scelta
                    </th>
                    <th>
                        Quantit&agrave;
                    </th>
                    <th>
                        Prezzo
                    </th>
                </tr>
                <?php
                    foreach($_SESSION['carrello'] as $nome=>$prezzo) { 
                            echo("
                                <tr class='content'>
                                    <td>
                                        ".$nome."
                                    </td>
                                    <td>
                                        ".$nPosti." biglietti
                                    </td>
                                    <td>
                                        € ".$prezzo."
                                    </td>
                                </tr>
                            "); 
                        }
                ?>
            </table>
            
            <table>
                <tr>
                    <th colspan="2">
                        Come si desiderano conservare i dati
                    </th>
                </tr>
                <tr>
                    <th>
                        Voglio riceverli via email
                    </th>
                    <th>
                        Voglio scaricare il PDF
                    </th>
                </tr>
                <tr class='content'>
                    <td>
                        ".$nome."
                    </td>
                    <td>
                        ".$nPosti." biglietti
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>