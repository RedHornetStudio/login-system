function moveToSignupPage() {
    location.href = "signup.php"
}

function signup() {
    var uid = document.getElementById('uid');
    var mail = document.getElementById('mail');
    var pwd = document.getElementById('pwd');
    var pwdRepeat = document.getElementById('pwd-repeat');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
        }
    };
    xhttp.open("POST", "includes/signup.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('signup-submit=yes&uid=' + uid.value + '&mail=' + mail.value + '&pwd=' + pwd.value + '&pwd-repeat=' + pwdRepeat.value);
}