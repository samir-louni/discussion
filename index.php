<?php 

session_start();

?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="discussion.css">
        <title>Accueil</title>
    </head>
    
    <body class="h1">
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
        <div class="main-contains">
            <img class="logo-nos" src="images-discussion/nostale.png" alt="Logo Nostale">
            <div class="description">
                Dans le MMORPG d'action anime NosTale, pars avec tes amis pour un voyage palpitant<br><br>
                à travers un monde fantastique et plein de secrets. Découvre plus de 30 classes de spécialiste<br><br>
                ainsi que de fidèles familiers pour des PvP, PvE et raids à grand frisson.
            </div>
                <iframe class="video1" width="660" height="415" src="https://www.youtube.com/embed/11EZuBbI9Ss" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="description">
            Si vous avez un désir pour les aventures, vous trouverez beaucoup à faire dans NosTale.<br>
            Le jeu suit une histoire excitante et tout ce que vous décidez a un impact sur l'histoire.<br>
            En jouant le rôle de votre caractère, vous vous trouverez de plus en plus mature et puissant.<br>
            La Pierre Time-Space forme l'arrière-plan de vos aventures et vous guide à travers votre voyage.<br><br>
            Vous pouvez aussi choisir de suivre votre déstin et d'avoir vos propres aventures.<br>
            Vous pouvez former un parti avec d'autres aventuriers pour renforcer la communauté dans le procès.<br>
            Ne vous souciez pas si vous ne trouvez pas d'autres joueurs!<br>
            Vous pouvez recruter des NosMates pour votre parti en capturant<br>
            des NPCs(Non Playing Characters) et des animaux.<br><br>
            NosTale vous offre la chance de recevoir une part de terrain et d'en faire <br>
            votre propre maison appelée Mini-Pays.<br>
            Vous pouvez utiliser votre Mini-Pays pour entraîner vos NosMates.
            </div>
                <iframe class="video1" width="660" height="415" src="https://www.youtube.com/embed/FEH_vwZrAcE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        </main>
        <footer>
            © All Right reserved Nadir & Samir Limited (N&SL)
        </footer>
    </body>
</html>