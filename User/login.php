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
        <section class="form login">
            <header>Connexion</header>
            <form action="#">
                <div class="error-txt"></div>
                    <div class="field input">
                        <label for="">Adresse Email</label>
                        <input type="text" name="email" placeholder="Entrer votre Adresse Email " required>
                    </div>
                    <div class="field input">
                        <label for="">Mot de passe</label>
                        <input type="password" name="password" placeholder="Entrer votre Mot de passe" required>
                        <i class="fas fa-eye"></i>
                        
                    </div>
                    <div class="field button">
                        <input type="submit" value="Se connecter">
                    </div>
                
            </form>
            <div class="link">Pas encore de compte? <a href="index.php">S'inscrire</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>