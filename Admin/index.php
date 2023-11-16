
<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        //if user is logged in
        header("location: accueil.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion aux chat</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="#" method="post">
            <h2>Se connecter </h2>
            <div class="inputBox">
                <input type="text" name="email" id="" required="required">
                <span>Adresse email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="" required="required">
                <span>Mot de passe</span>
                <i></i>
                <!-- <img src="assets/img/eye_16px.png" id="eye" alt=""> -->
            </div>
            <div class="links">
                <a href="#"></a>
                <a href="signup.php">S'inscrire?</a>
            </div>
            <div class="field button">
                <input id="btn" type="submit" value="Se connecter" name="login" style="--cir:#ff2770">
            </div>
            
        </form>
    </div>
    <script src="javascript/login.js"></script> 
</body>
</html>