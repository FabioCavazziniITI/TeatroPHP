<?php
	session_start();

    // Nel caso in cui l'utente abbia già fatto il login
    if (isset($_SESSION["active_login"])) {
        header("Location: index.php");
        exit;
    }

    // Tasto INVIO premuto
    if (isset($_POST["submit"])) {
        $user = $_POST["username"];
        $pwd = $_POST["password"];

        if ($user == "prof" && $pwd == "1234") {
            $_SESSION["active_login"] = $user;
            header("Location: index.php");
            exit;
        }
        else {
            $error = "Username o Password errati.";
        }
    }
?>
<html>
<head>
        <link rel="icon" href="https://www.teatrocomunaleferrara.it/wp-content/uploads/Teatro-comunale-di-Ferrara-logo-bianco.svg">
        <!--<link rel="stylesheet" type="text/css" href="css/cssLogin.css" media="all">-->
        <title>
            Teatro Comunale Ferrara - Login
        </title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background-color: #F7F3E9; /* Sfondo del sito */
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                color: #D4AF37; /* Colore del testo */
            }

            .login-container {
                background-color: #2C3E50; /* Sfondo del form */
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                text-align: center;
                width: 800px;
            }

            .login-container h1 {
                font-size: 2em;
                margin-bottom: 20px;
                font-style: oblique;
            }

            .login-container form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            .login-container input[type="text"],
            .login-container input[type="password"] {
                width: 100%;
                padding: 12px;
                border: 1px solid #D4AF37;
                border-radius: 8px;
                background-color: #F7F3E9;
                font-size: 1em;
                color: #333;
            }

            .login-container input:focus {
                border-color: #B22222;
                outline: none;
                box-shadow: 0 0 5px rgba(178, 34, 34, 0.5);
            }

            .button {
                background-color: #B22222;
                color: #F7F3E9;
                border: none;
                padding: 12px;
                border-radius: 8px;
                font-size: 1em;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.2s ease;
            }

            .button:hover {
                background-color: #740000;
                transform: scale(1.05);
            }

            .button:active {
                background-color: #590000;
                transform: scale(0.95);
            }

            .login-container a {
                color: #D4AF37;
                text-decoration: none;
                font-size: 0.9em;
            }

            .login-container a:hover {
                text-decoration: underline;
            }

            .footer {
                margin-top: 20px;
                font-size: 0.8em;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div id="Main">
                <?php
                if (isset($error)) {
                    echo "<p style=\"color: #FF0000;\">" . $error . "</p>";
                }
                ?>
                <div class="login-container">
                    <h1>
                    	Teatro Comunale Ferrara - Login
                    </h1>
                    <form action="login.php" method="post">
                        <label>
                            Usurname
                        </label>
                        <input type="text" name="username" placeholder="Nome utente" required>
                        <label>
                            Password
                        </label>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" class="button" name="submit" value="Accedi">
                    </form>
                    <div class="footer">
                        <a href="#">Password dimenticata?</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>