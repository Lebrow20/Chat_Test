<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
   
    if(!empty($fname) && !empty($lname) && !empty($email)){
         //let 's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //if email is valide
                
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
                             
                            
            
                            //let's modif all user data inside table
                            $sql2 = mysqli_query($conn, "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}' , img = '{$new_img_name}'
                                                WHERE unique_id = {$_SESSION['unique_id']}");
                            if($sql2){ //if data modified
                                echo "success";
            
                            }else
                            {
                                echo "Something went wrong!";
                            } 
                        }


                    }else{
                        //let's modif all user data inside table
                        $sql2 = mysqli_query($conn, "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}'
                        WHERE unique_id = {$_SESSION['unique_id']}");
                        if($sql2){ //if data modified
                        echo "success";

                        }else
                        {
                        echo "Something went wrong!";
                        } 
                    }
                }else{
                     //let's modif all user data inside table
                     $sql2 = mysqli_query($conn, "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}'
                                                  WHERE unique_id = {$_SESSION['unique_id']}");
                            if($sql2){ //if data modified
                                echo "success";
            
                            }else
                            {
                                echo "Something went wrong!";
                            } 
                }

            

        }else{
            echo "$email - This is not a valid email";
        }

    }else{
        echo "All input field are required!";
    } 
?>