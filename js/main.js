function moveToSignupPage() {
    location.href = "signup.php"
}

function signup() {
    var uid = document.getElementById('uid');
    var mail = document.getElementById('mail');
    var pwd = document.getElementById('pwd');
    p = pwd.value;
    var pwdRepeat = document.getElementById('pwd-repeat');
    var uidError = document.getElementById('uid-error');
    var mailError = document.getElementById('mail-error');
    var pwdError = document.getElementById('pwd-error');
    var pwdRepeatError = document.getElementById('pwd-repeat-error');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var errors = JSON.parse(this.responseText);
            console.log(this.responseText);

            if(errors.username != '' || errors.email != '' || errors.password != '' || errors.repeatPassword != '') {
                uidError.textContent = errors.username;
                mailError.textContent = errors.email;
                pwdError.textContent = errors.password;
                pwdRepeatError.textContent = errors.repeatPassword;
            } else if(errors.connection != '' || errors.query != '') {
                alert(errors.connection + errors.query);
            } else {
                loginAfterSignup(uid.value, p);
            }
            
        }
    };
    xhttp.open("POST", "includes/signup.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('signup-submit=yes&uid=' + uid.value + '&mail=' + mail.value + '&pwd=' + pwd.value + '&pwd-repeat=' + pwdRepeat.value);
    pwd.value = '';
    pwdRepeat.value = '';
}

function login() {
    var uid = document.getElementById('mailuid');
    var pwd = document.getElementById('pwdLogin');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var errors = JSON.parse(this.responseText);

            uid.value = '';
            pwd.value = '';

            if(errors.username != '' && errors.password != '') {
                alert(errors.username + '\n' + errors.password)
            } else if(errors.username != '') {
                alert(errors.username);
            } else if(errors.password != '') {
                alert(errors.password);
            } else if(errors.connection != '' || errors.query != '') {
                alert(errors.connection + errors.query);
            } else if(errors.login != '') {
                alert(errors.login);
            } else {
                location.href = "index.php"
            }
        }
    };
    xhttp.open("POST", "includes/login.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('login-submit=yes&mailuid=' + uid.value + '&pwd=' + pwd.value);
}

function logout() {
    location.href = 'includes/logout.inc.php';
}

function loginAfterSignup(uid, pwd) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var errors = JSON.parse(this.responseText);

            if(errors.username != '' && errors.password != '') {
                alert(errors.username + '\n' + errors.password)
            } else if(errors.username != '') {
                alert(errors.username);
            } else if(errors.password != '') {
                alert(errors.password);
            } else if(errors.connection != '' || errors.query != '') {
                alert(errors.connection + errors.query);
            } else if(errors.login != '') {
                alert(errors.login);
            } else {
                location.href = "index.php"
            }
            
        }
    };
    xhttp.open("POST", "includes/login.inc.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('login-submit=yes&mailuid=' + uid + '&pwd=' + pwd);
}

function wait(ms){
    var start = new Date().getTime();
    var end = start;
    while(end < start + ms) {
      end = new Date().getTime();
   }
 }