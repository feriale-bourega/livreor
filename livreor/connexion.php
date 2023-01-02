<?php 
session_start();
require('header.php');
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    //    var_dump('user');

    $query = "SELECT * FROM `utilisateurs` WHERE login = '$login' AND password = '$password'";
    // var_dump($conn);
    $result = mysqli_query($conn, $query);
    // var_dump($result);
   // $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    //on va utiliser num_rows pour verifier que l'utilisateur existe(nombre de lignes retournées)
    $resultat = mysqli_num_rows($result);
    
    //on fait un fetch row pour recup la ligne
    $resultat2 = mysqli_fetch_row($result);
    
    //Decryptage du password 
    $verify = password_verify($password, $resultat2[1]);
    }  
    if($verify == true)
    {
        if($resultat2[0]=='admin') //on verifie seulement le login puisque le password a deja été verifié
        {
            // session_start();
            $_SESSION['admin'] = 'admin'; 
            $_SESSION['user'] = $resultat2['login'];
            $_SESSION['userPass'] = $resultat2['password'];
            $_SESSION['userId'] = $resultat2['id'];
            header('location: commentaire.php');
            exit();
        }

        if($resultat == 1);
        {
            // session_start();
            $_SESSION['connexion'] =  $login ;
            header('location: profil.php');
            /**Redirige vers la page profil pour modifier les informations car le login n'est pas le bon('admin') */
            exit();
        }
        
    }


   // if ($rows) {
     //   $row= mysqli_fetch_assoc($result);
       // if (password_verify($password, $row['password'])) {
           // $_SESSION['user'] = $row['login'];
            //$_SESSION['userPass'] = $row['password'];
            //$_SESSION['userId'] = $row['id'];
    
            // $_SESSION['flash']['error'] = "You are logged now. ";
            //header('Location: profil.php');
        //}


        var_dump($_SESSION);
        //     echo "<div class='sucess'>
        //     <h3> MARCHE</h3>        
        //     </div>";
        //header("Location: /profil.php");
        // }else{
        //     $message = "Le nom d'utilisateur ou le mot de passe est incorrect";

        //     echo "<div class='sucess'>
        //     <h3>NE MARCHE PAS.</h3>        
        //     </div>";      

    //}
//}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php





    ?>
    <form class="box" action="connexion.php" method="post" name="login">
        <h1 class="box-logo  box-title"></h1>
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="connexion" name="submit" class="box-button">
        <p class="box-register">Vous êtes né ici?<a href="inscription.php">S'inscrire</a>
    <a href="commentaire.php">Commentaires</a></p>
        <?php if (!empty($message)) {   ?>
            <p class="error message"><?php echo $message;   ?></p>
        <?php } ?>
    </form>
</body>

</html>