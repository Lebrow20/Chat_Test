<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }

    include_once "php/config.php";
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$_SESSION['unique_id']}");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }

    $conn = mysqli_connect("localhost", "root", "", "txt");
            if (!$conn) {
                echo "Database not connected" . mysqli_connect_error();
            }

            $output = "";

            if (isset($_POST['keywords'])) {
                $keywords = mysqli_real_escape_string($conn, $_POST['keywords']);
                
                if (!empty($keywords)) {
                    $sql = mysqli_query($conn, "SELECT * FROM textes 
                                                WHERE OBJET LIKE '%$keywords%' OR ACTE LIKE '%$keywords%' 
                                                OR ORIGINE LIKE '%$keywords%'");

                    if ($sql) {
                        if (mysqli_num_rows($sql) > 0) {
                            $output .= "<table border='1' class='table table-striped table-bordered'>";
                        $output .= "<thead>
                                        <tr>
                                            <th>Acte</th>
                                            <th>Sigle</th>
                                            <th>OPER</th>
                                            <th>Date de publication</th>
                                            <th>Origine</th>
                                            <th>Objet</th>
                                            <th>S_KEY</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        
                        while ($row = mysqli_fetch_assoc($sql)) {
                            $output .= "<tr>
                                            <td>" . $row['ACTE'] . "</td>
                                            <td>" . $row['SIGLE'] . "</td>
                                            <td>" . $row['OPER'] . "</td>
                                            <td>" . $row['PUB_DATE'] . "</td>
                                            <td>" . $row['ORIGINE'] . "</td>
                                            <td>" . $row['OBJET'] . "</td>
                                            <td>" . $row['S_KEY'] . "</td>                        
                                        </tr>";
                        }
                        $output .= "<tbody></table>";
                        } else {
                            $output .= "Pas de recherche trouvée";
                        }
                    } else {
                        $output .= "Erreur dans la requête : " . mysqli_error($conn);
                    }
                } else {
                    $output .= "Veuillez entrer des mots-clés pour la recherche.";
                }
            }
            if (isset($_POST['yearRecherche'])) {          
                $output = "";        
                $year = $_POST['yearRecherche'];
            
                // Requête pour rechercher par année
                $sql = "SELECT * FROM textes WHERE YEAR(PUB_DATE) = '$year'";
                
                $result = mysqli_query($conn, $sql);
            
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $output .= "<table border='1' class='table table-striped table-bordered'>";
                        $output .= "<thead>
                                        <tr>
                                            <th>Acte</th>
                                            <th>Sigle</th>
                                            <th>OPER</th>
                                            <th>Date de publication</th>
                                            <th>Origine</th>
                                            <th>Objet</th>
                                            <th>S_KEY</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                        
                        while ($row = mysqli_fetch_assoc($result)) {
                            $output .= "<tr>
                                            <td>" . $row['ACTE'] . "</td>
                                            <td>" . $row['SIGLE'] . "</td>
                                            <td>" . $row['OPER'] . "</td>
                                            <td>" . $row['PUB_DATE'] . "</td>
                                            <td>" . $row['ORIGINE'] . "</td>
                                            <td>" . $row['OBJET'] . "</td>
                                            <td>" . $row['S_KEY'] . "</td>                        
                                        </tr>";
                        }
                        $output .= "<tbody></table>";
                    } else {
                        $output .= "Pas de recherche trouvée pour cette année.";
                    }
                } else {
                    $output .= "Erreur dans la requête : " . mysqli_error($conn);
                }
            }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/accueil.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="assets/css/fontawesome.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <title>Recherche</title>
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
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="nav_link" title="Déconnexion" style="--cir:#f0374a">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-box-arrow-in-right" viewBox="2 -2.4 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                        </svg>
                    </a>
                </li>            
            </ul>
        </nav>
        <!-- <ion-icon name="menu" class="header_toggle" id="toggle-menu"></ion-icon> -->
        <svg name="menu" class="header_toggle" id="toggle-menu" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
        </svg>
    </header>
    <div class="content_recherche">
            <h1 class="titre">Que voulez-vous savoir ?</h1>
            <div class="content">
                <div class="search">
                    <form class="form_recherche" method="POST" >
                        <!-- <input class="input_Text" type="text" name="recherche" placeholder="Rechercher un document..."> -->
                        <input type="text" name="keywords" id="keywords" class="input_Text" placeholder="Rechercher un document...">
                        <button class="btnSearch">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                        </button>
                    </form>
                </div>
                <div class="date">
                    <form class="form_recherche" action="" method="post">
                        <input type="number" id="yearRecherche" class="input_Text" name="yearRecherche" placeholder="Entrez l'année ..." min="1900" max="2100">
                        <button class="btnSearch">
                                Rechercher
                        </button>
                    </form>
                </div>
            </div>
            <div class="table-responsive">
                <?php echo $output; ?>
            </div>
    </div>
    
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ionicon.js"></script>   
</body>
</html>