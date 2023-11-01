<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
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
    <title>Chat</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./assets/img/DGI_logo.png" alt="">
            <a href="assets/accueil.php" class="header_logo">Direction Générale des Impôts</a>
        </div>
        <nav class="nav" id="nav-menu">
            <ion-icon name="close" class="header_close" id="close-menu"></ion-icon>

            <ul class="nav_list">
                <li class="nav_item"><a href="assets/accueil.php" class="nav_link" style="--cir:#45f3ff">Accueil</a></li>
                <li class="nav_item"><a href="assets/chat-admin.php" class="nav_link" style="--cir:#45f3ff">Administration</a></li>
                <li class="nav_item"><a href="admin.php" class="nav_link" style="--cir:#45f3ff">Utilisateur</a></li>
                <li class="nav_item"><a href="assets/recherche.php" class="nav_link" style="--cir:#45f3ff">Recherche</a></li>
            </ul>
        </nav>

        <ion-icon name="menu" class="header_toggle" id="toggle-menu"></ion-icon>
    </header>
<!-- <?php include_once "header.php";?> -->

    <div class="wrapper">
        <section class="users">
            <header>
            <?php
                include_once "php/config.php";
                $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
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
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>  
</body>
</html>