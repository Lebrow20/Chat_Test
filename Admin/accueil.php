<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }
?>
<?php
    include_once "php/config.php";
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = '{$_SESSION['unique_id']}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/accueil.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <title>Accueil</title>
</head>
<body>
    <header id="menu">
        <div class="logo">
            <img src="./assets/img/DGI_logo.png" alt="">
            <a href="accueil.php" class="header_logo">Direction Générale des Impôts</a>
        </div>
        <nav class="nav" id="nav-menu">
            <!-- <ion-icon name="close" class="header_close" id="close-menu"></ion-icon> -->
            <svg name="close" class="header_close" id="close-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg>
            <ul class="nav_list">
                <li class="nav_item"><a href="accueil.php" class="nav_link" style="--cir:#45f3ff">Accueil</a></li>
                <li class="nav_item"><a href="chat-admin.php" class="nav_link" style="--cir:#45f3ff">Administration</a></li>
                <li class="nav_item"><a href="admin.php" class="nav_link" style="--cir:#45f3ff">Utilisateur</a></li>
                <li class="nav_item"><a href="recherche.php" class="nav_link" style="--cir:#45f3ff">Recherche</a></li>
                <li class="nav_item"><a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="nav_link" style="--cir:#f0374a"><img src="assets/img/deconnexion_16.png" alt="déconnexion"></a></li>
            </ul>
        </nav>
        <svg name="menu" class="header_toggle" id="toggle-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg> 
    </header>
    <div class="fond">
        <img src="assets/img/impôts.jpg" alt="">
        <div class="contenu">
            <h1>Bienvenue <?php echo $row['fname'] . " " . $row['lname'] ?></h1>
            <h3><span class="auto-typing"></span></h3>
        </div>
    </div>
    <!-- <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script> -->
    <script src="javascript/typed.js"></script>
    <script>
        let typed = new Typed('.auto-typing', {
            strings: ['Connectez-vous,','Discutez,','Progressez :',"C'est ici que la communication prend vie."],
            typeSpeed: 100,
            backSpeed: 100,
            loop: true,
            fadeOut: true,
            fadeOutClass: 'typed-fade-out',
            fadeOutDelay: 500
        })
    </script>
    <script src="assets/js/main.js"></script>
<!--     <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>  --> 
</body>
</html>