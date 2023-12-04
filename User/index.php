<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        //if user is logged in
        header("location: users.php");
    }
?>
<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Inscription</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="upload">
                    <img src="assets/img/noprofil.jpg" width = 100 height = 100 alt="" style="--cir:#ff2770">
                    <div class="round">
                        <input type="file" id="inputFile" name="image" required>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff" class="bi bi-camera" viewBox="-3 -6 20 20">
                            <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                            <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="name-details">
                    <div class="field input">
                        <label for="">Nom</label>
                        <input type="text" name="fname" placeholder="Nom" required>
                    </div>
                    <div class="field input">
                        <label for="">Prénom(s)</label>
                        <input type="text" name="lname" placeholder="Prénom(s)" required>
                    </div>
                </div>
                    <div class="field input">
                        <label for="">Adresse Email</label>
                        <input type="text" name="email" placeholder="Adresse Email" required>
                    </div>
                    <div class="field input">
                        <label for="">Mot de passe</label>
                        <input type="password" name="password" placeholder="Mot de passe" required>
                        <i class="fas fa-eye"></i>
                    </div>
<!--                     <div class="field image">
                        <label for="">Select Image</label>
                        <input type="file" name="image" required>
                    </div> -->
                    <div class="field button">
                        <input type="submit" value="S'inscrire">
                    </div>
                
            </form>
            <div class="link">Vous avez déjà un compte? <a href="login.php">Se connecter</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
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