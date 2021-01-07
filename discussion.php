<?php 
session_start();
if (!isset($_SESSION['login'])) {
    header("Refresh: 2; url=connexion.php");
    echo "<p>Tu dois te connecter pour accéder au feed.</p><br><p>Redirection en cours...</p>";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "discussion";
$login = $_SESSION['login'];
$sql = mysqli_connect($servername, $username, $password, $dbname);


$req = mysqli_query($sql, "SELECT * FROM utilisateurs WHERE login='$login'");
$info = mysqli_fetch_assoc($req);
$id = $info['id'];
//var_dump($info);
//echo $id;



if (isset($_POST['submit'])) {
    $commentaires = $_POST['user_message'];
    $today = date('Y/m/d H:i:s');
    
    

    if (!empty($commentaires)) {
        $query = "INSERT INTO `messages`(`message`, `id_utilisateur`, `date`) VALUES ('$commentaires', '$id', '$today')";
        mysqli_query($sql, $query);
    } else {
        $remplissez = "Remplissez le svp.<br>";
    }

}

?>

<?php
$db = mysqli_connect('localhost', 'root', '', 'discussion');
$query = mysqli_query($db, 'SELECT date, messages.id, message, login FROM messages INNER JOIN utilisateurs ON id_utilisateur = utilisateurs.id ORDER BY id');
$headt = mysqli_query ($db, 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME=\'messages\'');
$all_result = mysqli_fetch_all($query);
//var_dump($resultat); 
?>


<!DOCTYPE html>
<hmtl lang="fr">

    <head>
        <title>Profil</title>
        <link rel="stylesheet" href="discussion.">
    </head>

    <body class="body4">
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
        <section class="tableaucentre">
        <table class="tab-or">
            <thead>
                <tr>
                    <td><h4>Dates</h4></td>
                    <td><h4>Messages</h4></td>
                    <td><h4>Utilisateurs</h4></td>
                </thead>
            <tbody class="tab-disc">
             
                <?php
                //var_dump($all_result);
                foreach ($all_result as $key) {
                    echo "<tr>";
                    $i=0;
                    foreach ($key as $value) {
                        if($i!=1){
                            echo "<td>$value</td>";
                        }
                        $i++;
                    }
                    echo "</tr>";
                }
    
                ?>
               
            </tbody>
    </table>
    </section>
    <section class="formulaire">
                    <div class="comcom">
                        <form action="" method="post">
                        <label for="msg"><h3>Message : </h3></label><br>
                        <textarea id="msg" name="user_message" maxlength="80" placeholder="80 caractères maximum." style="margin: 0px; width: 405px; height: 68px;" required></textarea>
                    </div>
                    <div class="button">
                        <button name="submit" type="submit" class = "confirm">Envoyer le commentaire</button>
                    </div>
                    <?php if (!empty($commentaires)) echo "<p>Message Envoyée.<p>";?>
                </form>
            </section>
        
</main>
        <footer class = "fot-discussion">
            © All Right reserved Nadir & Samir Limited (N&SL)
        </footer>
    </body>
</html>