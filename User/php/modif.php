<?php
    session_start();
    include_once "config.php";

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])){
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
   
        if(!empty($fname) && !empty($lname) && !empty($email)){
            // Vérifie si l'email est valide
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){             
                $updateQuery = "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}'";

                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];   
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['png','jpeg','jpg','JPG','PNG','JPEG'];

                    if(in_array($img_ext,$extensions)){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"Profile/".$new_img_name)){
                            $updateQuery .= ", img = '{$new_img_name}'";
                        }
                    }
                }

                $updateQuery .= " WHERE unique_id = {$_SESSION['unique_id']}";
                $sql2 = mysqli_query($conn, $updateQuery);

                if($sql2){
                    echo "success";
                } else {
                    echo "Il y a une erreur!";
                }
            } else {
                echo "$email - Cette adresse email n'est pas valide";
            }
        } else {
            echo "Tous les champs sont obligatoires!";
        } 
    }
?>
