<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE NOT unique_id = {$outgoing_id} 
                                AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        include "data_admin.php";
    }else{
        $output .= "No admin found related to your search term";
    }
    echo $output;
?>