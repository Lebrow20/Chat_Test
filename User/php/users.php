<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    /**Utiliser pour les admins en lignes dans notre projet */
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE NOT unique_id = {$outgoing_id}");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .="No admin are available to chat";
    }elseif (mysqli_num_rows($sql) > 0){
        include "data.php";
    }
    echo $output;
?>