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
    $img="";
    if ($row['img'] == NULL){
        $img = "noprofil.jpg";
    }else{
        $img = "php/Profile/".$row['img'];
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
    <title>Discussion entre Administration</title>
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
                <li class="nav_item">
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="nav_link" style="--cir:#f0374a">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="2 -2.4 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                </li>            
            </ul>
        </nav>
        <svg name="menu" class="header_toggle" id="toggle-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
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
                    <img src="<?php echo $img ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p id="status"><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="chat-group.php" class="logout">Groupe</a>
            </header>
            <div class="search">
                <span class="text">Select an admin to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#007bff" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                </button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>
    <script src="javascript/admin.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ionicon.js"></script>    
</body>
</html>