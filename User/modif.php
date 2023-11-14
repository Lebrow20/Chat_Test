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
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Modification Profil</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
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
                    <div class="field image">
                        <label for="">Select Image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="field button">
                        <input type="submit" value="Modifier le profil">
                    </div>
                
            </form>
        </section>
    </div>
    <script src="javascript/modif.js"></script>
</body>
</html>