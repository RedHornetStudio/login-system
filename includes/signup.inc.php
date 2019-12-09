<?php

if(isset($_POST['signup-submit'])) {

    require('dataBaseHandler.inc.php');

    $userName = trim($_POST['uid']);
    $email = trim($_POST['mail']);
    $password = trim($_POST['pwd']);
    $passwordRepeat = trim($_POST['pwd-repeat']);

    if(empty($userName) || empty($email) || empty($password) || empty($passwordRepeat)) {

    }

}

?>