<?php
    session_start();
    include_once "config.php";
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    @$ch = $_POST['ch'];
   
    if(!empty($nom) && !empty($prenom) && !empty($email)){
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
                            $domaine = implode(" | ",$ch);

                            //let's modif all user data inside table
                            $sql2 = mysqli_query($conn, "UPDATE admin 
                                                SET fname = '{$nom}', lname = '{$prenom}', email = '{$email}' , img = '{$new_img_name}', domaine = '{$domaine}'
                                                WHERE unique_id = {$_SESSION['unique_id']}");
                            if($sql2){ //if data modified
                                    echo "success";            
                            }else
                            {
                                echo "Something went wrong!";
                            } 
                        }


                    }else{
                        $domaine = implode(" | ",$ch);

                        //let's modif all user data inside table
                        $sql2 = mysqli_query($conn, "UPDATE admin 
                        SET fname = '{$nom}', lname = '{$prenom}', email = '{$email}', domaine = '{$domaine}'
                        WHERE unique_id = {$_SESSION['unique_id']}");
                    
                        if($sql2){ //if data modified
                                echo "success";            
                        }else
                        {
                            echo "Something went wrong!";
                        } 
                    }
                }else{
                    $domaine = implode(" | ",$ch);

                    //let's modif all user data inside table
                    $sql2 = mysqli_query($conn, "UPDATE admin 
                    SET fname = '{$nom}', lname = '{$prenom}', email = '{$email}', domaine = '{$domaine}'
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