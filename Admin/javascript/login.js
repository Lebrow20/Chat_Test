const form = document.querySelector(".box form"),
continueBtn = form.querySelector(".button input");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

continueBtn.onclick = ()=>{
    //let's start Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST","php/login.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                   location.href = "admin.php" 
                }else{
                    location.href = "assets/erreur.php";
                }
            }
        }

     }
    //we have to send the form data through ajax to php
    let formData = new FormData(form); //creating new formData object

    xhr.send(formData); //sending the form data to php
}