<?php
    session_start();

    require_once 'header.php';
    // var_dump($_SESSION);
    $idUser = $_SESSION['userId'];

    if(isset($_POST['send']))
    { $userComment = $_POST['userComment'];
      $date = date("Y/m/d H:i:s");
            $sql= "INSERT INTO `commentaires`( `commentaire`, `id_utilisateur`, `date`) 
            VALUES ('$userComment','$idUser','$date')";
            $queryComment = mysqli_query($conn, $sql);
            //  var_dump($queryComment);
            //  var_dump($sql);
            $_SESSION['flash']['sucess'] = "Your message has been posted.";
            // header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Magritte || Comment</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <link href="module.css" rel="stylesheet">
</head>
<body>
    <?php require 'header.php'?>
    <main class="main_form">
        <form action="" method="post" class="form">
            
            <h1 class="formTittle">Hello <?php //echo $_SESSION['user']?></h1>

        <div class="formSection formSection2">
            <label for="comment"></label>
            <textarea name="userComment" id="comment" class="formText" placeholder="Message" cols="30" rows="10"></textarea>
        </div>

        <div class="formSection formSection3">
            <input type="submit" name="send" value="Submit" class="formButton">
        </div>

        </form>
    </main>
    
</body>
</html>
