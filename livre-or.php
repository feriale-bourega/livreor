<?php
session_start();

require_once 'header.php';

$commentquery = mysqli_query($conn,"SELECT utilisateurs.login, commentaires.* 
FROM `utilisateurs` INNER JOIN `commentaires` 
WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `date` DESC");

$commentaire = mysqli_fetch_all($commentquery,MYSQLI_ASSOC);
// var_dump($commentaire);



if (isset($_POST['submit'])){
    $iduser = $_SESSION['userId'];
    // $date = date("d/m/Y H:i:s");
    $date = date_format(date_create($value['date']), 'd/m/Y H:i:s');
    // date_format(date_create($value['date']), 'd/m/Y H:i:s')


    $userComment = $_POST['com'];

    $sql= "INSERT INTO `commentaires`( `commentaire`, `id_utilisateur`, `date`) 
            VALUES ('$userComment','$idUser','$date')";
            $queryComment = mysqli_query($conn, $sql);
   // $querycomment = mysqli_query($conn, "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`)VALUES (`userComment`,`userId`, `date`)");
    header("Refresh:0");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Magritte || Golden Book</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <link href="module.css" type=text/css  rel="stylesheet">
</head>
<body>
    <?php require 'header.php'?>
    <main class="main_golden">
        <article class="main_golden-left">
            <h1>All Messages</h1>
            <?php
               foreach($commentaire as $comments=> $valeur):?>
                    <section class="golden_comment">
                    <div class="golden_comment-content">
                    <?= date_format(date_create($valeur['date']), 'd/m/Y H:i:s').'_'.$valeur['login'].'_'.$valeur['commentaire'] ?>     
                    </div>
               </section>
            <?php endforeach;?>
        </article>
        <article class="main_golden-right">
            <?php if(isset($_SESSION["user"])){?>

                <!-- <form action="" method="post" class="form">

                    <h1 class="formTittle">Write a message</h1>

                    <div class="formSection formSection1">
                        <label for="comment"></label>
                        <textarea type="text" id="comment" name="com" class="formText" placeholder="Message" cols="30" rows="10"></textarea>
                    </div>

                    <div class="formSection formSection2">
                        <button type="submit" value="submit" name="submit" class="formButton">Submit</button>
                    </div>
                    
                </form> -->

            <?php } 
            // var_dump($_SESSION);?>
        </article>
    </main>
    
</body>
</html>