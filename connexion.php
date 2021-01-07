<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'discussion');

?>



<!DOCTYPE html>
<hmtl lang="fr">

    <head>
        <title>Connexion</title>
        <link rel="stylesheet" href="discussion.">
    </head>

    <body class = "body2">
    <header>
                <section class="encart">
                <div class="titre1">
                    
                    </div>
                    <div class="titre1">
                    <a href="index.php">
                        <img class="ratufu" src="images-discussion/icon.png" alt = "Logo Ratufu">
                        </a>
                    </div>
                    <nav>
                        <li><a href="index.php">Accueil</a></li>

                        <?php 

    if (isset($_SESSION['login'])) {
        echo "<li><a href='profil.php'>Profil</a></li>";
        echo "<li><a href='discussion.php'>Discussion</a></li>";}
        else{
     echo "<li><a href='inscription.php'>Inscription</a></li>";
     echo "<li><a href='connexion.php'>Connexion</a></li>";

        
    }?>
                    </nav>
                </section>
        </header>
        </header>
        <main>
            <section class = "connexion">
                <div class = "carrerco">
                <?php 
                if (isset($_SESSION['login'])) {
                    header("Refresh: 2; url=index.php");
                    echo "<p>Tu es déja connecté. Tu dois te déconnecter pour acceder a cette page.</p><br><p>Redirection en cours...</p>";
                    exit();
                } ?>
                    <h3 class = "nex">Connexion</h3>
                    <form method="post">
                        <label for="login">ID </label>
                        <input type="text" name="login" id="login" class = "co2" ><br><br>
                        <label for="password">MDP </label>
                        <input type="password" name="password" id="password" class = "co" >
                         <?php
                if (isset($_POST['submit'])) {
                    $login = $_POST['login'];
                    $password = $_POST['password'];
                    $query = mysqli_query($connexion, "SELECT password FROM utilisateurs WHERE login = '$login'");
                    if(mysqli_num_rows($query) > 0){
                        $row = mysqli_fetch_assoc($query);
                        if(password_verify($password, $row['password'])){
                            $_SESSION['login'] = $login;
                            header("location: profil.php"); 
                        }   else    {
                            echo "<br>Le login ou le mot de passe n'est pas correct ! <br>";
                        }
                    }else{ 
                        echo "<br>Le login ou le mot de passe n'est pas correct ! <br>";
                    }
                }?>
                        <input type="submit" name="submit" value="Confirmer" class = "confirm">
                    </form>
                </div>
            </section>

        </main>
        <footer>
            © All Right reserved Nadir & Samir Limited (N&SL)
        </footer>
    </body>
</html>
