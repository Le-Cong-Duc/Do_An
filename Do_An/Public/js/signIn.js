const loginBtn = document.querySelector("#login");
const registerBtn = document.querySelector("#register");
const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");
const container = document.querySelector(".container");

loginBtn.addEventListener('click',()=>{
    loginBtn.style.backgroundColor = "rgba(0,0,0,0.5)";
    registerBtn.style.backgroundColor = "rgba(255, 255, 255,0.2)";

    loginForm.style.left = "50%";
    registerForm.style.left = "-50%";

    container.style.height = "600px";

    loginForm.style.opacity = 1;
    registerForm.style.opacity = 0;
})

registerBtn.addEventListener('click',()=>{
    loginBtn.style.backgroundColor = "rgba(255, 255, 255,0.2)";
    registerBtn.style.backgroundColor = "rgba(0,0,0,0.5)";

    loginForm.style.left = "150%";
    registerForm.style.left = "50%";

    container.style.height = "800px";

    loginForm.style.opacity = 0;
    registerForm.style.opacity = 1;
})

const logInput = document.getElementById('logPass');
const logInputIcon = document.getElementById('logPass-icon');
const regisInput = document.getElementById('regisPass');
const regisInputIcon = document.getElementById('regisPass-icon');
 
function myLogPass(){
    if(logInput.type === "password"){
        logInput.type = "text";

        logInputIcon.name = "eye-off-outline";
        logInputIcon.style.cursor = "pointer";
    }
    else{
        logInput.type = "password";
        logInputIcon.name = "eye-outline";
        logInputIcon.style.cursor = "pointer";
    }
}

function myRegisPass(){
    if(regisInput.type === "password"){
        regisInput.type = "text";

        regisInputIcon.name = "eye-off-outline";
        regisInputIcon.style.cursor = "pointer";
    }
    else{
        regisInput.type = "password";
        regisInputIcon.name = "eye-outline";
        regisInputIcon.style.cursor = "pointer";
    }
}