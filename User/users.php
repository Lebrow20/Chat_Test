<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
        exit();
    }
    
    include_once "php/config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $domaine = "";
    if(isset($_POST['domaine'])) {
        $domaine = mysqli_real_escape_string($conn, $_POST['domaine']);
    } 
    
    /**Utiliser pour les admins en lignes dans notre projet */      
     $output = "";
     if($domaine=="aucun" or $domaine==NULL){
        $sql = mysqli_query($conn, "SELECT * FROM admin");
         
         if(mysqli_num_rows($sql) == 0){
             $output .="No admin are available to chat";
        }elseif (mysqli_num_rows($sql) > 0){
            include "php/data.php";
        } 
     }else{
        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE domaine LIKE CONCAT('%', '{$domaine}', '%')");
         
         if(mysqli_num_rows($sql) == 0){
             $output .="No admin are available to chat";
        }elseif (mysqli_num_rows($sql) > 0){
            include "php/data.php";
        } 
     }
     
?>
<?php include_once "header.php";?>
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
                $img="";
                if ($row['img'] == NULL){
                    $img = "noprofil.jpg";
                }else{
                    $img = "php/Profile/".$row['img'];
                }
            ?>
                <div class="content">
                <a href="domaine.php" class="back-icon" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#007bff" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
                    <img src="<?php echo $img ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p id="status"><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="modif.php">
                    <svg id="modifIcone" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#007bff" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>

                <a href="php/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <!-- <span class="text">Voici les administrations qui pourront vous aider :  </span>
                <input type="text" placeholder="Enter name to search...">
                <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                </button> -->
            </div>
            <div class="users-list">
                <?php echo $output; ?>
            </div>
        </section>
    </div>
    <script>
        const searchBar = document.querySelector(".users .search input"),
        searchBtn = document.querySelector(".users .search button"),
        usersList = document.querySelector(".users .users-list");

        searchBtn.onclick = ()=>{
            searchBar.classList.toggle("active");
            searchBar.focus();
            searchBtn.classList.toggle("active");
            searchBar.value = "";
        }

        searchBar.onkeyup = ()=>{
            let searchTerm = searchBar.value;
            if(searchTerm !=""){
                searchBar.classList.add("active");
            }else{
                searchBar.classList.remove("active");
            }
            //let's start Ajax
            let xhr = new XMLHttpRequest(); //creating XML object
            /* xhr.open("POST","php/search.php", true); */
            xhr.open("POST","php/search.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        usersList.innerHTML = data;
                    }
                }

            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm); 
        }

    </script>
    <!-- <script src="javascript/users.js"></script> -->
</body>
</html>