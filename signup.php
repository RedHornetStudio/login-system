<?php
    require('templates/header.php');
?>

    <main>
        <section class="signup-section">
            <h1>Sign up</h1>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" id="uid" placeholder="Username">
                <input type="text" id="mail" placeholder="E-mail">
                <input type="password" id="pwd" placeholder="Password">
                <input type="password" id="pwd-repeat" placeholder="Repeat password">
                <button type="button" onclick="signup()">SIGN UP</button>
            </form>
        </section>
    </main>

<?php
    require('templates/footer.php');
?>