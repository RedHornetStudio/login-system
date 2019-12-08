<?php
    require('templates/header.php');
?>

    <main>
        <section class="signup-section">
            <h1>Sign up</h1>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">SIGN UP</button>
            </form>
        </section>
    </main>

<?php
    require('templates/footer.php');
?>