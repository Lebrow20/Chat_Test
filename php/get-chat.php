<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        
        $sql = "SELECT * FROM messages 
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ASC  ";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){ //if this is equal to then he is a msg sender
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }else{ //he is a msg receiver
                    $sql1 = "SELECT * FROM admin WHERE unique_id = {$row['outgoing_msg_id']}";
                    $query1 = mysqli_query($conn, $sql1);
                    $user="";
                if(mysqli_num_rows($query1) > 0){
                     while($row1 = mysqli_fetch_assoc($query1)){
                        $user= $row1['fname'] . " " . $row1['lname'];
                     }
                    }
                    $output .= '<div class="chat incoming">
                                    <img src="admin.png" alt="">
                                    <div class="details">
                                        <h6>'.$user.'</h6>
                                        <p>'.$row['msg'].'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("../login.php");
    }
?>