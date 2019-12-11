<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="This is an example of a meta descritpion. This will often show up in search results.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/main.js"></script>
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-header-main clearfix">         
            <ul>
                <li style="margin: 6px"><a href="index.php" style="padding: 0px; background-color: rgb(58, 58, 58);">
                    <img src="img/RedHornetLogo.png" alt="Red Hornet Logo" height="40px"></a></li>
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">PORTFOLIO</a></li>
                <li><a href="#">ABOUT ME</a></li>
                <li><a href="#">CONTACT</a></li>
            </ul>
            <div>
                <form action="includes/login.inc.php" method="POST">
                    <input type="text" name="mailuid" placeholder="Username/E-mail...">
                    <input type="password" name="pwd" placeholder="Password...">
                    <button type="submit" name="login-submit">LOGIN</button>
                    <button type="button" onclick="moveToSignupPage()">SIGN UP</button>
                </form>
                <form action="includes/logout.inc.php" method="POST" style="display: none;">
                    <button type="submit" name="logout-submit"></button>
                </form>
            </div>
        </nav>
    </header>