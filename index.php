<?php
    require('templates/header.php');
?>

    <main>
        <section class="main-section">
            <?php 
            
                if(isset($_SESSION['userId'])) {
                    $userName = $_SESSION['userId'];
                    echo "<p>You are logged in ass user with id: $userName</p>";
                } else {
                    echo '<p>You are signed out</p>';
                }

            ?>
        </section>
    </main>

<?php
    require('templates/footer.php');
?>