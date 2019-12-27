<?php

if(isset($_POST['signup-submit'])) {

    $userNameUsers = trim($_POST['uid']);
    $emailUsers = trim($_POST['mail']);
    $pwdUsers = trim($_POST['pwd']);
    $pwdRepeatUsers = trim($_POST['pwd-repeat']);

    $errors = ['connection' => '', 'query' => '', 'username' => '', 'email' => '', 'password' => '', 'repeatPassword' => ''];
    require('dataBaseHandler.inc.php');

    // check for errors in input fields
    if(empty($userNameUsers)) {
        $errors['username'] = 'a username is required';
    } else {
        if(!preg_match("/^[a-zA-Z0-9]+$/", $userNameUsers)) {
            $errors['username'] = 'invalid username';
        }
    }

    if(empty($emailUsers)) {
        $errors['email'] = 'an email is required';
    } else {
        if(!filter_var($emailUsers, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'invalid email';
        }
    }

    if(empty($pwdUsers)) {
        $errors['password'] = 'a password is required';
    }

    if(empty($pwdRepeatUsers)) {
        $errors['repeatPassword'] = 'a confirmation password is required';
    }

    if(!empty($pwdUsers) && !empty($pwdRepeatUsers) && $pwdUsers != $pwdRepeatUsers) {
        $errors['repeatPassword'] = 'password are not matching';
    }

    $isError = false;
    foreach($errors as $error) {
        if($error != '') {
            $isError = true;
            break;
        }
    }

    if(!$isError) {
        // if no errors in input fields connect to database and check for connection and query errors
        $dbh = new Dbh;
        $conn = $dbh->connect();
        $errors['connection'] = $dbh->connError;

        if($conn) {
            $hashedPwd = password_hash($pwdUsers, PASSWORD_DEFAULT);

            try {
                $sql = 'INSERT INTO users (userNameUsers, emailUsers, pwdUsers) VALUES (:userNameUsers, :emailUsers, :pwdUsers)';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['userNameUsers' => $userNameUsers, 'emailUsers' => $emailUsers, 'pwdUsers' => $hashedPwd]);
            } catch (PDOException $e) {
                $errors['query'] = 'Query error: ' . $e;
            }
        }
        $conn = null;
    }

    $errorsJSON = json_encode($errors);
    echo $errorsJSON;
}

?>