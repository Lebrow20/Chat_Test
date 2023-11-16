<?php
    session_start();
    include_once "config.php";
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($password)){
         //let 's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valide
            //let's check that email already exist in the database or not
            $sql = mysqli_query($conn, "SELECT email FROM admin WHERE email = '{$email}'");
            if(mysqli_num_rows($sql)>0){ //if email  already exist
                echo "$email - this email already exist";

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
                            $sql2 = mysqli_query($conn, "INSERT INTO admin (unique_id, fname, lname, email,img, password, status)
                                                VALUES ('{$random_id}','{$nom}','{$prenom}','{$email}','{$new_img_name}','{$password}','{$status}')");
                            if($sql2){ //if data inserted
                                $sql3 = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique_id in other php file
                                    echo "success";
                                }
            
                            }else
                            {
                                echo "Something went wrong!";
                            } 
                        }


                    }else{
                        echo "please select an image file jpeg jpg png";
                    }
                }else{
                    echo "please select an image file";
                }

            }

        }else{
            echo "$email - This is not a valid email";
        }

    }else{
        echo "All input field are required!";
    } 
?>