<?php
$connexion = mysqli_connect('localhost', 'root', '', 'discussion');

    $login = '';
    $password = '';
    $confirm = '';


?>


<!DOCTYPE html>
<hmtl lang="fr">

    <head>
        <title>Inscription</title>
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
        <main>
            <section class = "inscription">
                <div class = "carrerco2">
                <?php 
                if (isset($_SESSION['login'])) {
                    header("Refresh: 2; url=index.php");
                    echo "<p>Tu es déja connecté. Tu dois te déconnecter pour acceder a cette page.</p><br><p>Redirection en cours...</p>";
                    exit();
                } ?>
                    <h3 class = "nex">Inscription</h3>
                    <form method="post">
                    
                        <label for="login">LOGIN</label>
                        <input type="text" name="login" id="login" class = "co"><br><br>

                        <label for="password">MDP</label>
                        <input type="password" name="password" id="password" class = "co2"><br><br>
                        <label for="confirm_password">CONFIRMEZ</label>
                        <input type="password" name="confirm_password" id="confirm_password" class = "co3" >
                        <?php
                    if(isset($_POST['submit'])){
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);
    $crypt = password_hash($password, PASSWORD_BCRYPT);
    $verif = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $verif_suite = mysqli_query($connexion, $verif);



if(!empty($login) && !empty($password) && !empty($confirm)){
    if(mysqli_num_rows($verif_suite) == 0){
        if($password == $confirm){
            $query = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$crypt')";
            mysqli_query($connexion, $query);
            header("Location:connexion.php");

        }else
            echo '<br>Les mots de passe ne sont pas identiques.<br>';
    }else 
        echo '<br>Ce login existe déja<br>';
}
else
    echo '<br>Veuillez remplir le formulaire s\'il vous plait ! <br>';
}
?>
                        <input type="submit" name="submit" value="S'inscrire !" class = "confirm" >
                    </form>
                </div>
            </section>

        </main>
        <footer class = "fot-inscri">
            © All Right reserved Nadir & Samir Limited (N&SL)
        </footer>
    </body>
</html>
