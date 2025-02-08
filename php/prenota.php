<?php
    session_start();

    if (isset($_POST["logout"])) {
        unset($_SESSION["active_login"]);
        setcookie("NomeUtente", "", time() - 3600, "/"); // Elimina il cookie impostandone la scadenza nel passato
        header("Location: ../login.php");
        exit;
    }

    if (!isset($_SESSION["active_login"])) {
        header("Location: ../login.php");
        exit;
    }

    // Controlla se il cookie è impostato
    if (isset($_COOKIE["NomeUtente"])) {
        $user = $_COOKIE["NomeUtente"];
    }
    else {
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
        <div class="header">
            <!--LOGO-->
            <div class="logo">
                <a href="../index.php">
                    <img src="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg" alt="logo" class="img_logo">
                </a>
                <p class="name_sito">
                    <a href="../index.php">
                        Teatro Comunale Ferrara
                    </a>
                </p>
            </div>

            <!--STAMPA COOKIE-->
            <div class="cookie">
                <?php
                    if (isset($_COOKIE["NomeUtente"])) {
                        echo "Utente loggato: " . $user;
                    } else {
                        echo $user;
                    }
                ?>
            </div>
    
            <!--MENU-->
            <div class="nav">
                <ul>
                    <li>
                        <a href="../index.php">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="prenota.php">
                            <u class="now">
                                Prenota
                            </u>
                        </a>
                    </li>
                    <li>
                        <a href="carrello.php">
                                Carrello
                        </a>
                    </li>
                    <li>
                        <form action="prenota.php" method="POST">
                            <input type="submit" class="logout-button" name="logout" value="Logout">
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- POSTI -->
        <div class="prenotazione">
            <div class="posti">
                <div class="imgPosti">
                    <img src="../img/piantina_posti.jpg">
                </div>
                <div class="elencoPosti">
                    <p class="textPrezzi">
                        I nostri prezzi
                    </p>
                    <div class="costi">
                        <div class="costi1">
                            <!--Galleria PRIMO PIANO-->
                            <b>Galleria 1&deg; piano</b><br>
                            <p>
                                Galleria laterale: <span class="giallo">1-8 / 18-26</span><br>
                                Costo: &euro; 42.00
                            </p>
                            <p>
                                Galleria pre-centrale: <span class="violetto">9 / 17</span><br>
                                Costo: &euro; 43.50
                            </p>
                            <p>
                                Galleria centrale: <span class="rosso">10-12 / 14-16</span><br>
                                Costo: &euro; 45.00
                            </p>
                            <hr>
                            <!--Galleria SECONDO PIANO-->
                            <b>Galleria 2&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="verde">0-4 / 22-26</span><br>
                                Costo: &euro; 40.00
                            </p>
                            <p>
                                Galleria laterale: <span class="giallo">5-8 / 18-21</span><br>
                                Costo: &euro; 41.50
                            </p>
                            <p>
                                Galleria pre-centrale: <span class="violetto">9 / 17</span><br>
                                Costo: &euro; 43.50
                            </p>
                            <p>
                                Galleria centrale: <span class="rosso">10-16</span><br>
                                Costo: &euro; 45.00
                            </p>
                        </div>
                        <div class="costi2">
                            <!--Galleria 3° PIANO-->
                            <b>Galleria 3&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="blu">0-4 / 22-26</span><br>
                                Costo: &euro; 38.00
                            </p>
                            <p>
                                Galleria laterale: <span class="marrone">5-8 / 18-21</span><br>
                                Costo: &euro; 40.00
                            </p>
                            <p>
                                Galleria centrale: <span class="giallo">9-17</span><br>
                                Costo: &euro; 42.00
                            </p>
                            <hr>
                            <!--Galleria 4° PIANO-->
                            <b>Galleria 4&deg; piano</b><br>
                            <p>
                                Galleria lato palco: <span class="blu">2-4 / 22-24</span><br>
                                Costo: &euro; 36.00
                            </p>
                            <p>
                                Galleria laterale: <span class="marrone">5-8 / 18-21</span><br>
                                Costo: &euro; 38.00
                            </p>
                            <p>
                                Galleria centrale: <span class="verde">9-17</span><br>
                                Costo: &euro; 40.00
                            </p>
                        </div>
                        <div class="costi3">
                            <!--BALCONATA-->
                            <b>Balconata</b><br>
                            <p>
                                Balcone laterale: <span class="blu_scuro">11 posti per lato</span><br>
                                Costo: &euro; 29.00
                            </p>
                            <p>
                                Balcone pre-centrale: <span class="marrone">11 posti per lato</span><br>
                                Costo: &euro; 30.50
                            </p>
                            <p>
                                Balcone centrale: <span class="verde">35 posti</span><br>
                                Costo: &euro; 32.00
                            </p>
                            <hr>
                            <!--PLATEA-->
                            <b>Platea</b><br>
                            <p>
                                File: <span class="rosso">A-Q</span><br>
                                Costo: &euro; 50
                            </p>
                            <p>
                                File: <span class="violetto">R-V</span><br>
                                Costo: &euro; 47.50
                            </p>
                            <p>
                                Posti: <span class="blu">Handicap</span><br>
                                Costo: &euro; 47.50
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--COMPRA BIGLIETTI-->
        <div class="biglietti">
            <div class="formContainer">
                <form action="../php/carrello.php" method="post" class="ticketForm">
                    <h2>Aggiungi al carrello i tuoi biglietti!</h2>
            
                    <!-- Selezione della zona -->
                    <div class="formGroup">
                        <label for="zona">Zona preferita:</label>
                        <select id="zona" name="zona" required>
                            <option value="">-- Seleziona una zona presente nei prezzi --</option>
                            <!--PLATEA-->
                            <option value="plateaA">Platea | file A-Q</option>
                            <option value="plateaI">Platea | file R-V</option>
                            <option value="plateaH">Platea - handicap</option>
                            <!--PRIMO PIANO-->
                            <option value="divisorio">-- PRIMO PIANO --</option>
                            <option value="galleria1">1&deg; Piano | Galleria laterale</option>
                            <option value="galleria1_1">1&deg; Piano | Galleria pre-centrale</option>
                            <option value="galleria1_2">1&deg; Piano | Galleria centrale</option>
                            <!--SECONDO PIANO-->
                            <option value="divisorio">-- SECONDO PIANO --</option>
                            <option value="galleria2">2&deg; Piano | Galleria lato palco</option>
                            <option value="galleria2_1">2&deg; Piano | Galleria laterale</option>
                            <option value="galleria2_2">2&deg; Piano | Galleria pre-centrale</option>
                            <option value="galleria2_3">2&deg; Piano | Galleria centrale</option>
                            <!--TERZO PIANO-->
                            <option value="divisorio">-- TERZO PIANO --</option>
                            <option value="galleria3">3&deg; Piano | Galleria lato palco</option>
                            <option value="galleria3_1">3&deg; Piano | Galleria laterale</option>
                            <option value="galleria3_2">3&deg; Piano | Galleria centrale</option>
                            <!--QUARTO PIANO-->
                            <option value="divisorio">-- QUARTO PIANO --</option>
                            <option value="galleria4">4&deg; Piano | Galleria lato palco</option>
                            <option value="galleria4_1">4&deg; Piano | Galleria laterale</option>
                            <option value="galleria4_2">4&deg; Piano | Galleria centrale</option>
                            <!--QUINTO PIANO-->
                            <option value="divisorio">-- BALCONATA --</option>
                            <option value="balcone5">Balcone laterale</option>
                            <option value="balcone5_1">Balcone pre-centrale</option>
                            <option value="balcone5_2">Balcone centrale</option>
                        </select>
                    </div>

                    <!-- Numero di posti -->
                    <div class="formGroup">
                        <label for="numeroPosti">Numero di posti:</label>
                        <input type="number" id="numeroPosti" name="numeroPosti" min="1" max="10" value="1" required>
                    </div>
            
                    <!-- Pulsante di invio -->
                    <div class="formGroup">
                        <button type="submit" class="submitButton"><img width="50" height="50" src="https://img.icons8.com/3d-fluency/94/shopping-cart-loaded.png" alt="shopping-cart-loaded"/></button>
                    </div>
                </form>
            </div>
        </div>

        <!--FOOTER-->
        <div class="footer">
            <div class="footer_div">
              <a href="http://www.iiscopernico.edu.it/" target="_blank">
                <img class="img_footer" src="../img/Stemma_ITI.png" alt="Logo ITI cliccabile">
              </a>
              <br>
              <I>
                <a href="http://www.iiscopernico.edu.it/" target="_blank">
                    IIS "N.Copernico - Carpeggiani"
                </a>
              </I>
            </div>
            <div class="footer_div">
              &#0169 Cavazzini Fabio
              <br><br>
              <a href="mailto:fabio.cavazzini@iticopernico.it">
                  fabio.cavazzini@iticopernico.it
              </a>
              <br><br>
                Classe V G
              <br><br>
                A.S. 2024 - 2025
            </div>
          </div>
    </body>
</html>