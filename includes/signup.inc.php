<?php

if(isset($_POST['signup-submit'])) {

    echo $_POST['signup-submit'] . '<br>';
    echo $_POST['uid'] . '<br>';
    echo $_POST['mail'] . '<br>';
    echo $_POST['pwd'] . '<br>';
    echo $_POST['pwd-repeat'] . '<br>';
    require('dataBaseHandler.inc.php');
    $dbh = new Dbh;
    $pdo = $dbh->connect();

    if($pdo) {

    }
}

?>