<?php
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn,$sql2);       
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
            $msgImage = $row2['img'];
        }else{
            $result = "Pas de message disponible";
        } 
        // triming message if word are more than 28
        (strlen($result) > 25) ? $msg = substr($result, 0, 23).'...' : $msg = $result; 
        // adding you: text before msg if login id send msg    
        $you=""; 
        $id="";
        $message="";
        $sql3="SELECT * FROM messages";
        $query3 = mysqli_query($conn,$sql2);        
        $row3 = mysqli_fetch_assoc($query3);
        if(mysqli_num_rows($query2) > 0){
          $id = $row3['outgoing_msg_id'];
      }
      if ($outgoing_id == $id){
        $you = "Vous: ";
        if($msg!=NULL){
          $message = '<p>'. $you . $msg .'</p>';
        }elseif($msgImage!=NULL){
          $message = '<p>Vous avez envoyé une image</p>';
        }        
       } else{ 
          if ($msg=="Pas de message disponible"){
              $message = '<p>'. $msg .'</p>';
          }else{
            $you = "";
            if($msg!=NULL){
              $message = '<p"><strong>'. $you . $msg .'</strong></p>';
            }elseif($msgImage!=NULL){
              $message = '<p"><strong>A envoyé une image</strong></p>';
            } 
            /* $message = '<p"><strong>'. $you . $msg .'</strong></p>'; */
          }
       }
       //check user is online or not
       if($row['status'] == "Offline now") {       
        $status = "<img src = 'offline.ico'/>";
      }else{
        $status = "<img src = 'online.ico'/>";
      }
      $img="";
      if ($row['img'] == NULL){
          $img = "noprofil.jpg";
      }else{
          $img = "../User/php/Profile/".$row['img'];
      }  
        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                    <img src="'.$img.'" alt="">
                    <div class="details">
                        <h3 id="mon_span">'.$row['fname'] . " " . $row['lname'].'</h3>
                        '. $message .'
                    </div>
                    </div>
                    <div class="status-dot">'.$status.'</i></div>
                    </a>';
     }
?>