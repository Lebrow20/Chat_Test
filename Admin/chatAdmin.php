<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: index.php");
    }
?>
<?php include_once "header.php";?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
                    include_once "php/config.php";
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']); //récupérer l'id du receveur de msg
                    $sql = mysqli_query($conn, "SELECT * FROM admin WHERE unique_id = {$user_id}");
                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                    $img="";
                    if ($row['img'] == NULL){
                        $img = "admin.png";
                    }else{
                        $img = "php/Profile/".$row['img'];
                    } 
                ?> 
                <a href="chat-admin.php" class="back-icon" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
                    </svg>
                </a>
                <img src="<?php echo $img ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                    <p><?php echo $row['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden=""> <!-- msg sender id -->
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden=""> <!-- msg receiver id -->
                <!-- <input type="text" name="message" class="input-field" placeholder="Type a message here..." oninput="capitalizeFirstLetter(this);"> -->
                <textarea name="message" class="input-field"  placeholder="Type a message here..." style="width : 350px" oninput="capitalizeFirstLetter(this);" oninput="adjustTextareaHeight(this);"></textarea>
                <button>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                </svg>
                </button>
            </form>
        </section>
    </div>
    <script>
        function capitalizeFirstLetter(input) {
            input.value = input.value.charAt(0).toUpperCase() + input.value.slice(1);
        }
    </script>
    <script>
        function adjustTextareaHeight(textarea) {
            textarea.style.height = "auto";  // Réinitialise d'abord la hauteur
            textarea.style.height = (textarea.scrollHeight) + "px";  // Ajuste la hauteur en fonction du contenu
        }
    </script>
    <script src="javascript/chatAdmin.js"></script>
    <script src="assets/js/ionicon.js"></script>  
</body>
</html>