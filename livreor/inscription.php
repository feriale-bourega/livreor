<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require('header.php');
if (isset ($_REQUEST['username'], $_REQUEST['email'], $_REQUEST['password'])) {
    // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string ($conn, $username);
    // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string ($conn, $email);
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_POST['username'];
    // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
    // $_password = striplashes($_REQUEST['password']);
    // $_password = mysqli_real_escape_string ($conn, $_password);
    // requête SQL + mot de passe crypté
    $query = "INSERT into `utilisateurs`(login,email,password) VALUES ('$username', '$email', '$password')";
    // $query = "INSERT into `users`(username,email,password) VALUES ('$username', '$email', '".hash('sha256, $password')."')";
    // Exécuter la requête sur la base de données
    $res = mysqli_query($conn, $query);
    if($res){
        echo "<div class='sucess'>
              <h3>Vous êtes inscrits avec succès.</h3>
              <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a>
              </p>
              </div>";
    } 

} else{    
    ?>
    <form class="box" action="inscription.php"  method="post">
        <h1  class="box-logo  box-title"></h1>
        <h1 class="box-title">S'inscrire</h1>
        <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
        <input type="text" class="box-input"  name="email"  placeholder="Email" required />
        <input type="password"   class="box-input"  name="password"   placeholder="Mot de passe"  required  />
        <input type="submit"  name="submit" value="S'inscrire"   class="box-button"   />
        <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
</form>
<?php }  ?>
</body>
</html>   
