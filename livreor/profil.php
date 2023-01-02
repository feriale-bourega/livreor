<?php
    session_start();
    require 'header.php';
// var_dump($_SESSION);


    if(!isset($_SESSION["user"])){
        $_SESSION['flash']['error'] ="All changes have been made, you can log back in.";
        header('Location: index.php');
        exit();
    }
    
    $loginSession = $_SESSION['user'];
    // var_dump($loginSession);
    $passwordSession = $_SESSION['userPass'];
    // var_dump($passwordSession);
    $id = $_SESSION['userId'];
    // var_dump($id);


    
    $query= mysqli_query($conn, "SELECT * FROM `utilisateurs` WHERE `id` = '$id'");
    $queryResult = mysqli_fetch_assoc($query);
    
    if(isset($_POST['submit']))
    {
        if(empty($_POST['login'])){
            $errors['login'] = "Your login is not valid";
        }
            
        else{
        $newLogin = $_POST['login'];
       // $login = $queryResult['login'];
        $sql = "UPDATE `utilisateurs` 
                SET `login`='$newLogin'  WHERE `id` = '$id'";
         $updateLogin = mysqli_query($conn, $sql);
         $_SESSION['user'] = $newLogin;
        $_SESSION['flash']['sucess'] = "Your login has been changed, you can relog.";
        
        header('Location: profil.php');
        }
    }
        
    if(isset($_POST['submit']))
    {
        if(empty($_POST['password'])){
            $errors['password'] = "You must enter a valid password";
        }

        $hashPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $newPass = $hashPassword;

        if( password_verify( $_POST['password_confirm'],$newPass)){
        // $login = $queryResult['password'];
        $sql = "UPDATE `utilisateurs` 
                SET `password`='$newPass'  WHERE `id` = '$id'";
        $updatePassword= mysqli_query($conn, $sql);
 
        header('Location: profil.php');

    }else{
            $errors['password_confirm'] = "Your password doesn't match";
       
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go Magritte || Profil</title>
    <link rel="icon" type="image/x-icon" href="./assets/images/favicon.ico">
    <link href="module.css" type="text/css" rel="stylesheet">
</head>
<body>
    <?php require 'header.php'?>
    <main class="main_form">
       
        <?php
         if(!empty($errors)): 
         ?>
                <div class="errors">
                    <p>You have not completed the form correctly.</p>
                    </ul>
                        <?php 
                        foreach($errors as $error): 
                        ?>
                            <li><?= $error;
                             ?></li>

                        <?php 
                    endforeach; 
                    ?>
                    </ul>
                </div>
        <?php 
    endif; 
    ?>
    
        
        <form action="" method="post" class="form">
            <h1 class="formTittle">Welcome 
                <?= $_SESSION['user'] ?></h1>
            <div class="formSection formSection1">
                    <label for="login"></label>
                    <input type="text" name="login" placeholder="Change your login" class="formText" value="<?= $_SESSION['user'] ?>">
            </div>

            <div class="formSection formSection2">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Change your password" class="formText" value="*******">
            </div>
            
            </div>
            <div class="formSection formSection3">
                    <label for="password_confirm"></label>
                    <input type="password" name="password_confirm" placeholder="Confirm your password" class="formText" value="*******">
            </div>
                    
            <div class="formSection formSection4">
                    <button type="submit" name="submit" class="formButton">Metrre à jour</button>
            </div>
            
            <a href="index.php" class="formBack formSection ">Cancel</a>
        </form>

    </main>
    
</body>
</html>
