<?php
// Initialiser la session
session_start();
// Vérifier si l'utilisateur est connecté,sinon redirigez-le vers la page de connexion
// if (!isset($_SESSION["username"])){
//     header("Location:connexion.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html>
    <head>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
    <div class="sucess">
    <h1>Bienvenue  <?php 
    // echo $_SESSION['username']; 
    ?>!</h1>
    <p>C'est votre tableau de bord.</p>
    <a href="deconnexion.php">Déconnexion</a>
    <a href="inscription.php">inscription</a>
    <a href="connexion.php">connexion</a>
    <a href="profil.php">profil</a>
    <a href="commentaire.php">commentaire</a>
</div>
</body>
</html>