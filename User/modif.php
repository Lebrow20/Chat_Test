<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<?php include_once "header.php";?>
<?php
  include_once "php/config.php";
   $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
  if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
  }
  $img="";
  if ($row['img'] == NULL){
      $img = "assets/img/noprofil.jpg";
  }else{
      $img = "php/Profile/".$row['img'];
  } 
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>
            <a href="users.php" class="back-icon" >
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#1F8246" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                </svg>
            </a>
                Modification Profil
            </header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="upload">
                    <img src="<?php echo $img ?>" width = 100 height = 100 alt="" style="--cir:#ff2770" name="image">
                    <div class="round">
                        <input type="file" id="inputFile" name="image">
                        <svg id="sendFile" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-camera" viewBox="6 -3 20 20">
                            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">First name</label>
                        <input type="text" name="fname" placeholder="First name" value="<?php echo $row['fname'] ?>" required>
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lname" placeholder="Last name" value="<?php echo $row['lname'] ?>" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="">Email address</label>
                        <input type="text" name="email" placeholder="Enter your email" value="<?php echo $row['email'] ?>" required>
                    </div>
                    <!-- <div class="field image">
                        <label for="">Select Image</label>
                        <input type="file" name="image">
                    </div> -->
                    <div class="field button">
                        <input type="submit" value="Modifier le profil">
                    </div>
                
            </form>
        </section>
    </div>
    <script src="javascript/modif.js"></script>
    <script>
        const image = document.querySelector("img"),
        input = document.querySelector("#inputFile");
        input.addEventListener("change",() =>{
            image.src = URL.createObjectURL(input.files[0]);
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const sendFileButton = document.getElementById('sendFile');
        const fileInput = document.getElementById('inputFile');

        sendFileButton.addEventListener('click', function() {
            fileInput.click(); // Déclenche le clic sur l'élément input de type file
        });

        fileInput.addEventListener('change', function() {
            // Le code pour traiter le fichier sélectionné peut être placé ici
            console.log('Fichier sélectionné :', this.files[0]);
        });
    });

    </script>
    <script>
        function reset(){
            document.getElementById('inputFile').value="";
        }
    </script>
</body>
</html>