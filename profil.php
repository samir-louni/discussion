<?php 

session_start();

?>



<!DOCTYPE html>
<hmtl lang="fr">

    <head>
        <title>Profil</title>
        <link rel="stylesheet" href="discussion.">
    </head>

    <body class="body3">
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
        <main>
            <section class = "profil"><div class = " tableauprofil " >
    <?php


    if (!isset($_SESSION['login'])) {
        header("Refresh: 1; url=connexion.php");
        echo "<p>connecte toi.</p><br><p>Redirection...</p>";
        exit();
    }
    $login = $_SESSION['login'];
    $sql = mysqli_connect('localhost', 'root', '', 'discussion');
            
        if (!$sql) {
                echo "Erreur connexion";
                exit();
        }else {
                echo "<h3>Bienvenue sur ton profil $login</h3><br>";
        }

    $requete = mysqli_query($sql, "SELECT * FROM utilisateurs WHERE login='$login'");
    $info = mysqli_fetch_assoc($requete);
    $password = $info['password'];

    $modification="";
    $formNewLogin="";
    $formNewPass="";
    $same="";
    $existe="";
    $valide="";
    $vide="";
    $wrong="";
    $delete="";
    $oui="";





    echo "Login : $login<br>";

        if (isset($_POST['modifier'])) {
            $modification =    "Modifier le Login cliquer <input type=\"submit\" name=\"modifierlogin\" value=\"Ici\" class = 'confirm2'><br>
                                Modifier le Mot de passe cliquer <input type=\"submit\" name=\"modifierpass\" value=\"Ici\" class = 'confirm2'><br>";
        }

        if (isset($_POST['modifierlogin'])) {
            $formNewLogin =  
                "<form method=\"post\">
                    <input type=\"text\" name=\"newlogin\" id=\"login\" placeholder=\"nouveau login\" class = 'co5'>
                    <input type=\"submit\" name=\"submitnewlogin\" value=\"valider\" class = 'confirm2' >
                </form>";
        }

        if (isset($_POST['submitnewlogin'])) {
            $newLogin = $_POST['newlogin'];
            $checklogin = mysqli_query($sql, "SELECT login FROM utilisateurs WHERE login='$login'");
            
            if (!empty(trim($newLogin))) {
                $query = "UPDATE utilisateurs SET login='" . htmlentities(trim($newLogin)) . "' WHERE login='$login'";

                if ($login == $newLogin) {
                    $same = "utiliser un autre que $login<br>";
                }
                
                elseif (mysqli_num_rows($checklogin) == 0) {
                    $existe = "Le login est déjà utilisé par un autre utilisateur<br>";
                }
                
                elseif (mysqli_query($sql, $query)) {
                    $valide = "vous modifié '$login' à '$newLogin' <br>";
                    header("Refresh:1");
                    $_SESSION['login'] = $newLogin;
                }
                
            }else {
                $vide = "Remplissez le formulaire.<br>";
            }
        }

        if (isset($_POST['modifierpass'])) { 
            $formNewPass = 
                "<form method=\"post\">
                    <input type=\"text\" name=\"pass\" id=\"nom\" placeholder=\"Entrer l'ancien Password\" class = 'co5'><br>
                    <input type=\"text\" name=\"newpass\" id=\"nom\" placeholder=\"Entrer un nouveau Password\" class = 'co5'><br>
                    <input type=\"text\" name=\"confirmnewpass\" id=\"nom\" placeholder=\"Confirmer le nouveau Password\" class = 'co5'><br>
                    <input type=\"submit\" name=\"submitnewpass\" value=\"valider\" class = 'confirm2'>
                </form>
            ";
        }

        if (isset($_POST['submitnewpass'])) {
            $newpassword = trim($_POST['newpass']);
            $confirm_password = trim($_POST['confirmnewpass']);
            
            if (!empty($_POST['pass']) && !empty($newpassword) && !empty($confirm_password)) {
                // Verrifier si les deux password sont identiques
                if ($newpassword != $confirm_password) {
                    $same = "le mot de passe n'est pas identique.<br>";
                }

                // verrifier si l'ancien mot de pass est identique
                if(password_verify($_POST['pass'],$password )){
                    $crypt = password_hash($newpassword, PASSWORD_BCRYPT);
                    $query = "UPDATE utilisateurs SET password='" . htmlentities($crypt) . "' WHERE login='$login'";
                    mysqli_query($sql, $query);
                    echo "Le mot de passe a bien été changé";
                    header("Refresh:3"); 
                }else{
                    $wrong = "Le mot de passe n'est pas correct.";
                }  
            } else {
                $vide = "Remplissez le formulaire.<br>";
            }
        
        }
        if (isset($_POST['deconnecter'])) {
            session_unset ( );
            header("Location: connexion.php"); 
            }

        if (isset($_POST['supprimer'])) {
            $delete =  'supprimer votre compte ?<br>
                        <form method="post">
                        <input type="submit" name="oui" value="oui">
                        <input type="submit" name="non" value="non">
                        </form>';
                        }

        if (isset($_POST['oui'])) {
            
            (mysqli_query($sql, "DELETE FROM utilisateurs WHERE login = '$login'"));
            session_unset ( );
            $oui = "compte supprimé.";
            header("Refresh:2"); 
            }

    ?> 
                <div class = "espace">
                    <form action="" method="post">
                        <p>Modifier tes information ici <input type="submit" name="modifier" value="Modifier" class = 'confirm2'></p>
                        <p><?php echo $modification ?></p>
                        <p><?php echo $formNewLogin ?></p>
                        <p><?php echo $formNewPass ?></p>
                        <p><?php echo $same ?></p>
                        <p><?php echo $existe ?></p>
                        <p><?php echo $valide ?></p>
                        <p><?php echo $vide ?></p>
                        <p><?php echo $wrong ?></p>
                    </form>
                    <form action="" method="post">
                    <input type="submit" name="deconnecter" value="Deconnexion" class = 'confirm2'>
                    <input type="submit" name="supprimer" value="Supprimer" class = 'confirm2'>
                    </form>
                    <p><?php  echo $delete   ?></p>
                    <p><?php  echo $oui   ?></p>
            </div></div></section>
        </main>
        </main>
        <footer class="fot-profil">
            © All Right reserved Nadir & Samir Limited (N&SL)
        </footer>
    </body>
</html>