// Claer when typed
document.getElementById('username').addEventListener('input', () =>{
    document.getElementById('usermsg').innerText = "";
});
document.getElementById('password').addEventListener('input', () =>{
    document.getElementById('pwdmsg').innerText = "";
});

document.getElementById('susername').addEventListener('input', () =>{
    document.getElementById('susermsg').innerText = "";
});
document.getElementById('spassword').addEventListener('input', () =>{
    document.getElementById('spwdmsg').innerText = "";
});
document.getElementById('cpassword').addEventListener('input', () =>{
    document.getElementById('scpwdmsg').innerText = "";
});

function logvalidate() {
    let reg = /^[a-zA-Z0-9]+$/;
    let username = document.getElementById('username').value;    
    let password = document.getElementById('password').value;  

    if(username.length<4){
        document.getElementById('usermsg').innerText = "**Username is invalid";
        return false;
    }
    else if(reg.test(username) == false){
        document.getElementById('usermsg').innerText = "**Username is invalid";
        return false;
    }
    else if(password.length<4){
        document.getElementById('pwdmsg').innerText = "**Password should be atleast 4 characters";
        return false;
    }
    else{
        return true;
    }
}

function signvalidate() {
    let reg = /^[a-zA-Z0-9]+$/;
    let susername = document.getElementById('susername').value;    
    let spassword = document.getElementById('spassword').value;  
    let cpassword = document.getElementById('cpassword').value;  

    if(susername.length<4){
        document.getElementById('susermsg').innerText = "**Username should atleast be 4 characters";
        return false;
    }
    else if(reg.test(susername) == false){
        document.getElementById('susermsg').innerText = "**Username should be alphanumeric only";
        return false;
    }
    else if(spassword.length<4){
        document.getElementById('spwdmsg').innerText = "**Password should be atleast 4 characters";
        return false;
    }
    else if(cpassword != spassword){
        document.getElementById('scpwdmsg').innerText = "**Passwords do not match";
        return false;
    }
    else{
        return true;
    }
}

