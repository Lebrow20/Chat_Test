<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $output = "";
        $sql = "SELECT * FROM msg_group ORDER BY msg_gp_id ASC  ";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){

                if($row['outgoing_msg_id'] === $outgoing_id){ //if this is equal to then he is a msg sender


                    /* $image="";
                    if($row['img'] != NULL) {
                        $image='<img id="imageSend" src="'.'php/message/'.$row['img'].'" width="100" height="auto" alt="">';
                    } */
                    $messageSend = "";
                    $image="";
                    if($row['img'] != NULL && $row['msg_gp'] != NULL ) {
                        $image='<img id="imageSend" src="'.'php/message/'.$row['img'].'" width="100" height="auto" alt="">';
                        $messageSend = '<p>'.$row['msg_gp'].'</p>'.$image;
                    }elseif($row['msg_gp'] != NULL && $row['img'] == NULL){
                        $messageSend = '<p>'.$row['msg_gp'].'</p>';

                    }elseif($row['msg_gp'] == NULL && $row['img'] != NULL){
                        $image='<img id="imageSend" src="'.'php/message/'.$row['img'].'" width="100" height="auto" alt="">';
                        $messageSend = $image;

                    }

                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        
                                        '.$messageSend.'
                                    </div>
                                </div>';
                }else{ //he is a msg receiver
                    $sql1 = "SELECT * FROM admin WHERE unique_id = {$row['outgoing_msg_id']}";
                    $query1 = mysqli_query($conn, $sql1);
                    $user="";
                    $img="";
                if(mysqli_num_rows($query1) > 0){
                     while($row1 = mysqli_fetch_assoc($query1)){
                        $user= $row1['fname'] . " " . $row1['lname'];
                        if ($row1['img'] == NULL){
                            $img = "noprofil.jpg";
                        }else{
                            $img = "php/Profile/".$row1['img'];
                        }
                     }
                    }
                    $messageSend = "";
                    $image="";
                    if($row['img'] != NULL && $row['msg_gp'] != NULL ) {
                        $image='<img id="imageSend" src="'.'php/message/'.$row['img'].'" width="100" height="auto" alt="">';
                        $messageSend = '<p>'.$row['msg_gp'].'</p>'.$image;
                    }elseif($row['msg_gp'] != NULL && $row['img'] == NULL){
                        $messageSend = '<p>'.$row['msg_gp'].'</p>';

                    }elseif($row['msg_gp'] == NULL && $row['img'] != NULL){
                        $image='<img id="imageSend" src="'.'php/message/'.$row['img'].'" width="100" height="auto" alt="">';
                        $messageSend = $image;

                    }

                    $output .= '<div class="chat incoming">
                                    <img id="pdp" src="'.$img.'" alt="">
                                    <div class="details">
                                        <h6>'.$user.'</h6>
                                        
                                        '.$messageSend.'
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("../index.php");
    }
?>