<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        //if user is logged in then come to this page otherwise go to login page
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            //IF LOGOUT ID IS SET
            $status = "Offline now";
            //once user logout the we'll update this status to offline and in the login form
            // we'll again update the status to active now if user logged in successfully
            $sql = mysqli_query($conn, "UPDATE admin SET status = '{$status}' WHERE unique_id = {$logout_id} ");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        }else{
            header("location: ../admin.php");
        }
        
    }else {
        header("location: ../index.php"); 
    }
?> 