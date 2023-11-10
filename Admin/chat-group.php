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
                <a href="chat-admin.php" class="back-icon" ><i class="fas fa-arrow-left"></i></a>
                <img src="group.png" alt="">
                <div class="details">
                    <span>Discussion de groupe</span>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden=""> <!-- msg sender id -->
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden=""> <!-- msg receiver id -->
                <!-- <input type="text" name="message" class="input-field" placeholder="Type a message here..." oninput="capitalizeFirstLetter(this);"> -->
                <textarea name="message" class="input-field"  placeholder="Type a message here..." style="width : 350px" oninput="capitalizeFirstLetter(this);" oninput="adjustTextareaHeight(this);"></textarea>
                <button><i class="fab fa-telegram-plane"></i></button>
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
    <script src="javascript/chatGroup.js"></script>
</body>
</html>