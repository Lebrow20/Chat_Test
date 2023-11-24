<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
         //let 's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valide
            //let's check that email already exist in the database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){ //if email  already exist
                echo "$email - Cet adresse email existe déjà";

            }else{
                
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png','jpeg','jpg','JPG','PNG','JPEG'];
                    if(in_array($img_ext,$extensions)== true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"Profile/".$new_img_name)){
                            $status = "Active now"; //once user signed up then his status will be active now
                            $random_id = rand(time(),10000000); //creating ramdom id for user
            
                            //let's insert all user data inside table
                            $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email,img, password, status)
                                                VALUES ('{$random_id}','{$fname}','{$lname}','{$email}','{$new_img_name}','{$password}','{$status}')");
                            if($sql2){ //if data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file
                                    echo "success";
                                }
            
                            }else
                            {
                                echo "Il y a une erreur!";
                            } 
                        }


                    }else{
                        echo "Veuillez sélectionner une image de type jpeg jpg png";
                    }
                }else{
                    echo "Veuillez sélectionner une image";
                }

            }

        }else{
            echo "$email - Cet adresse email n'est pas valide";
        }

    }else{
        echo "Tous les champs sont obligatoires!";
    } 
?>