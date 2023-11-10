<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        /* $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']); */
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO msg_group (outgoing_msg_id, msg_gp, date_msg_gp) 
                                VALUE ({$outgoing_id},'{$message}', NOW())") or die();
        }

    }else{
        header("../index.php");
    }
?>