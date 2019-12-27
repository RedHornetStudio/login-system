<?php

if(isset($_POST['login-submit'])) {
    require('dataBaseHandler.inc.php');

    $errors = ['connection' => '', 'query' => '', 'username' => '', 'password' => '', 'user' => ''];

    $mailuid = trim($_POST['mailuid']);
    $pwd = trim($_POST['pwd']);
    $user = '';

    // check for errors in input fields
    if(empty($mailuid)) {
        $errors['username'] = 'a username is required';
    } else {
        if(!preg_match("/^[a-zA-Z0-9]+$/", $mailuid)) {
            $errors['username'] = 'invalid username';
        }
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
            } catch (PDOException $e) {
                $errors['query'] = 'Query error: ' . $e;
            }
        }
        $conn = null;
    }

    $errors['user'] = $user;
    $errorsJSON = json_encode($errors);
    echo $errorsJSON;
}

?>