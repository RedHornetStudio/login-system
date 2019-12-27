<?php
    require('templates/header.php');
?>

    <main>
        <section class="main-section">
            <h1>This is Portfolio</h1>
            <?php 
            
                if(isset($_SESSION['userId'])) {
                    $userId = $_SESSION['userId'];
                    echo "<p>You are logged in ass user with id: $userId</p>";
                } else {
                    echo '<p>You are signed out</p>';
                }

            ?>
        </section>
    </main>

<?php
    require('templates/footer.php');
?>