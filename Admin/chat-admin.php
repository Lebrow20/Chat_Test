<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }
?>
<?php
    include_once "php/config.php";
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Discussion entre Administration</title>
</head>
<body>
<header id="menu">
        <div class="logo">
            <img src="./assets/img/DGI_logo.png" alt="">
            <a href="accueil.php" class="header_logo">Direction Générale des Impôts</a>
        </div>
        <nav class="nav" id="nav-menu">
            <ion-icon name="close" class="header_close" id="close-menu"></ion-icon>

            <ul class="nav_list">
                <li class="nav_item"><a href="accueil.php" class="nav_link" style="--cir:#45f3ff">Accueil</a></li>
                <li class="nav_item"><a href="chat-admin.php" class="nav_link" style="--cir:#45f3ff">Administration</a></li>
                <li class="nav_item"><a href="admin.php" class="nav_link" style="--cir:#45f3ff">Utilisateur</a></li>
                <li class="nav_item"><a href="recherche.php" class="nav_link" style="--cir:#45f3ff">Recherche</a></li>
            </ul>
        </nav>
        <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout"><img src="assets/img/deconnexion_16.png" alt="déconnexion"></a>
        <ion-icon name="menu" class="header_toggle" id="toggle-menu"></ion-icon>
    </header>
    <body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="admin.png" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
            </header>
            <div class="search">
                <span class="text">Select an admin to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>
    <script src="javascript/admin.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>  
</body>
</html>