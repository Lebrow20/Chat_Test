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
    $img="";
    if ($row['img'] == NULL){
        $img = "noprofil.jpg";
    }else{
        $img = "php/Profile/".$row['img'];
    }
    $ch = explode(" | ", $row['domaine']);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du profile</title>
    <link rel="stylesheet" href="assets/css/signup.css">

</head>
<body>
    <div class="box">
        <span class="borderLine"></span>
        <form action="#" method="post">
            <h2>Modification </h2>
            <div class="error-txt"></div>
            <div class="upload">
                <img src="<?php echo $img ?>" name="image"  width = 100 height = 100 alt="" style="--cir:#ff2770">
                <div class="round">
                    <input type="file" id="inputFile" name="image">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-camera" viewBox="-3 -5 20 20">
                        <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1v6zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4H2z"/>
                        <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zM3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z"/>
                    </svg>
                </div>
            </div>
            <div class="inputBox">
                <input type="text" name="nom" id="" required="required" value="<?php echo $row['fname'] ?>">
                <span>Nom</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="prenom" id="" required="required" value="<?php echo $row['lname'] ?>">
                <span>Prénom</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="text" name="email" id="" required="required" value="<?php echo $row['email'] ?>">
                <span>Adresse email</span>
                <i></i>
            </div>
            <div id="domaine">Domaine</div>
            <div class="check">
                <input type="checkbox" name="ch[]" value="IS"  <?php if(@in_array("IS",$ch)) echo"checked" ?>>IS 
                <input type="checkbox" name="ch[]" value="IMP" <?php if(@in_array("IMP",$ch)) echo"checked"?>>IMP
                <input type="checkbox" name="ch[]" value="IRSA" <?php if(@in_array("IRSA",$ch)) echo"checked" ?>>IRSA
                <input type="checkbox" name="ch[]" value="IPVI" <?php if(@in_array("IPVI",$ch)) echo"checked" ?>>IPVI <br>
                <input type="checkbox" name="ch[]" value="IR" <?php if(@in_array("IR",$ch)) echo"checked" ?>>IR           
                <input type="checkbox" name="ch[]" value="IDH" <?php if(@in_array("IDH",$ch)) echo"checked" ?>>IDH
                <input type="checkbox" name="ch[]" value="IFT" <?php if(@in_array("IFT",$ch)) echo"checked" ?>>IFT &nbsp;
                <input type="checkbox" name="ch[]" value="IFPB" <?php if(@in_array("IFPB",$ch)) echo"checked" ?>>IFPB
            </div>
            <div class="links">
                <a href="#"></a>
                <a href="accueil.php">Revenir à l'accueil?</a>
            </div>
            <div class="field button">
                <input id="btn" type="submit" value="Modifier" name="signup" style="--cir:#ff2770">
            </div>
            
        </form>
    </div>
    <script src="javascript/modif.js"></script> 
    <script>
        const image = document.querySelector("img"),
        input = document.querySelector("#inputFile");
        input.addEventListener("change",() =>{
            image.src = URL.createObjectURL(input.files[0]);
        })
    </script>
</body>
</html>