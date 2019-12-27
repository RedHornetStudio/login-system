<?php

if(isset($_POST['login-submit'])) {
    require('dataBaseHandler.inc.php');

    $errors = ['connection' => '', 'query' => '', 'username' => '', 'password' => '', 'login' => ''];

    $mailuid = trim($_POST['mailuid']);
    $pwd = trim($_POST['pwd']);
    $user = '';

    // check for errors in input fields
    if(empty($mailuid)) {
        $errors['username'] = 'a username is required';
    }

    if(empty($pwd)) {
        $errors['password'] = 'a password is required';
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
            try {
                $sql = 'SELECT * FROM users WHERE userNameUsers = :mailuid OR emailUsers = :mailuid';
                $stmt = $conn->prepare($sql);
                $stmt->execute(['mailuid' => $mailuid]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if($user) {
                    $pwdCheck = password_verify($pwd, $user['pwdUsers']);

                    if($pwdCheck == false) {
                        $errors['login'] = 'no such user or wrong password';
                    } else if($pwdCheck == true) {
                        session_start();
                        $_SESSION['userId'] = $user['idUsers'];
                        $_SESSION['userName'] = $user['userNameUsers'];
                    } else {
                        $errors['login'] = 'no such user or wrong password';
                    }
                } else {
                    $errors['login'] = 'no such user or wrong password';
                }
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