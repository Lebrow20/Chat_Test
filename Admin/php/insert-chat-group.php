<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        /* $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']); */
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];           
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ['png', 'jpeg', 'jpg', 'JPG', 'PNG', 'JPEG'];
    
            if (in_array($img_ext, $extensions)) {
                $time = time();
                $new_img_name = $time . $img_name;
    
                if (move_uploaded_file($tmp_name, "message/" . $new_img_name)) {
                    
                        $sql = "INSERT INTO msg_group (outgoing_msg_id, msg_gp, img, date_msg_gp) 
                                VALUES ({$outgoing_id}, '{$message}', '{$new_img_name}', NOW())";
                        mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    
                }
            }
        } else {
            if (!empty($message)) {
                $sql = "INSERT INTO msg_group (outgoing_msg_id, msg_gp, date_msg_gp) 
                        VALUES ({$outgoing_id}, '{$message}', NOW())";
                mysqli_query($conn, $sql) or die(mysqli_error($conn));
            }
        }
    }else{
        header("../index.php");
        exit();
    }
?>