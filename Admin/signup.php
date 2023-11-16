
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
    <title>Inscription aux chat</title>
    <link rel="stylesheet" href="assets/css/signup.css">

</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="#" method="post">
            <h2>Inscription </h2>
            <div class="error-txt"></div>
            <div class="upload">
                <img src="assets/img/noprofil.jpg" width = 100 height = 100 alt="" style="--cir:#ff2770">
                <div class="round">
                    <input type="file" id="inputFile" name="image" required="required">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-camera" viewBox="-3 -5 20 20">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                </div>
            </div>
            <div class="inputBox">
                <input type="text" name="nom" id="" required="required">
                <span>Nom</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="prenom" id="" required="required">
                <span>Prénom</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="email" id="" required="required">
                <span>Adresse email</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" name="password" id="" required="required">
                <span>Mot de passe</span>
                <i></i>
            </div>
            <div class="links">
                <a href="#"></a>
                <a href="index.php">Se connecter?</a>
            </div>
            <div class="field button">
                <input id="btn" type="submit" value="S'inscrire" name="signup" style="--cir:#ff2770">
            </div>
            
        </form>
    </div>
    <script src="javascript/signup.js"></script> 
    <script>
        const image = document.querySelector("img"),
        input = document.querySelector("#inputFile");
        input.addEventListener("change",() =>{
            image.src = URL.createObjectURL(input.files[0]);
        })
    </script>
</body>
</html>