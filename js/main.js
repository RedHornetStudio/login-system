function moveToSignupPage() {
    location.href = "signup.php"
}

function signup() {
    var uid = document.getElementById('uid');
    var mail = document.getElementById('mail');
    var pwd = document.getElementById('pwd');
    var pwdRepeat = document.getElementById('pwd-repeat');
    var uidError = document.getElementById('uid-error');
    var mailError = document.getElementById('mail-error');
    var pwdError = document.getElementById('pwd-error');
    var pwdRepeatError = document.getElementById('pwd-repeat-error');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var errors = JSON.parse(this.responseText);

            if(errors.username != '' || errors.email != '' || errors.password != '' || errors.repeatPassword != '') {
                uidError.textContent = errors.username;
                mailError.textContent = errors.email;
                pwdError.textContent = errors.password;
                pwdRepeatError.textContent = errors.repeatPassword;
            } else if(errors.connection != '' || errors.query != '') {
                alert(errors.connection + errors.query);
            } else {
                location.href = "index.php"
            }
            
        }
    };
    xhttp.open("POST", "includes/signup.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('signup-submit=yes&uid=' + uid.value + '&mail=' + mail.value + '&pwd=' + pwd.value + '&pwd-repeat=' + pwdRepeat.value);
    pwd.value = '';
    pwdRepeat.value = '';
}