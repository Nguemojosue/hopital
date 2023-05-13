<?php 
session_start();
require('model/User.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Stagio - Connexion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>


    <!-- Connexion box -->
        <center class="connect-box">
            <h1 class="logox">Hospital</h1><br><br><br>
            <div class="boxConnexion">
                <h2>Connexion</h2>
                <?php 
                if(isset($_POST['connect'])){
                    
                    $user = htmlspecialchars(trim($_POST['email']));
                    $pass = htmlspecialchars(trim($_POST['pass']));

                    if(!empty($user) AND !empty($pass)){
                        $users = new User();
                        $results = $users->connect($user,$pass);

                        if(count($results) == 0){
                            echo "<span class='erreur'>Informations incorrects !</span>";
                        }else{

                        $_SESSION['user'] = $user;
                        ?>
                            <script type="text/javascript">
                                 self.location.href = 'dashboard/dashboard.php?page=dash';
                            </script>
                        <?php
                      

                       }
                        
                    }
                }
            ?>
                <form method="post">
                    <input type="text" placeholder="Email" class="formx" name="email">
                    <input type="password" placeholder="Mot de passe" class="formx" name="pass">

                     <div class="submit_btn">
                        <button class="boxed-btn3 w-100" type="submit" name="connect">Se connecter</button>
                    </div>
                </form>
                <br>
            </div>
        </center>
        <br><br>

    <!-- End connexion box -->


    <!--contact js-->

</body>

</html>