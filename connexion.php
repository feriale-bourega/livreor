<?php session_start();
require('header.php');
if (isset($_POST['submit'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    //    var_dump('user');

    $query = "SELECT * FROM `utilisateurs` WHERE login='$login'";
    // var_dump($conn);
    $result = mysqli_query($conn, $query);
    // var_dump($result);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    var_dump($rows);


    if ($rows) {
        if (password_verify($password, $rows[0]['password'])) {
            $_SESSION['user'] = $rows['0']['login'];
            $_SESSION['userPass'] = $rows['0']['password'];
            $_SESSION['userId'] = $rows['0']['id'];
            // $_SESSION['flash']['error'] = "You are logged now. ";
            header('Location: profil.php');
        }

        // var_dump($_SESSION);
        //     echo "<div class='sucess'>
        //     <h3> MARCHE</h3>        
        //     </div>";
        //header("Location: /profil.php");
        // }else{
        //     $message = "Le nom d'utilisateur ou le mot de passe est incorrect";

        //     echo "<div class='sucess'>
        //     <h3>NE MARCHE PAS.</h3>        
        //     </div>";      

    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php





    ?>
    <form class="box" action="" method="post" name="login">
        <h1 class="box-logo  box-title"><a href="https://waytolearnx.com/">WayToLearnX.com</a></h1>
        <h1 class="box-title">Connexion</h1>
        <input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
        <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        <input type="submit" value="connexion" name="submit" class="box-button">
        <p class="box-register">Vous êtes né ici?<a href="inscription.php">S'inscrire</a></p>
        <?php if (!empty($message)) {   ?>
            <p class="error message"><?php echo $message;   ?></p>
        <?php } ?>
    </form>
</body>

</html>