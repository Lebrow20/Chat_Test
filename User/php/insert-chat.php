<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, date_msg) 
                                VALUES ({$incoming_id},{$outgoing_id},'{$message}', NOW())") or die();
        }
        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];           
            $tmp_name = $_FILES['image']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $extensions = ['png', 'jpeg', 'jpg', 'JPG', 'PNG', 'JPEG'];
    
            if (in_array($img_ext, $extensions)) {
                $time = time();
                $new_img_name = $time . $img_name;
    
                if (move_uploaded_file($tmp_name, "../../Admin/php/message/" . $new_img_name)) {
                    
                        $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, img, date_msg) 
                                VALUES ({$incoming_id},{$outgoing_id}, '{$new_img_name}', NOW())";
                        mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    
                }
            }
        }   
    }else{
        header("../index.php");
        exit();
    }
?>