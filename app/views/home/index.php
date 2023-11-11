<?php
session_start();
?>

<?php
require_once('../app/views/template/header.php');
?>

<main> 
    <section class="store-main-section">
        <h1>Traveling GO</h1>
        
        <div class="store-grid-container">
            <div class="grid-item grid-item-1 purple-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
            <div class="grid-item grid-item-2 purple-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
            <div class="grid-item grid-item-3 purple-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
            <div class="grid-item grid-item-4 blue-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
            <div class="grid-item grid-item-5 pink-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
            <div class="grid-item grid-item-6 pink-skin"><img class="skin-image" src="../assets/images/skin-7.jpg" alt=""></div>
        </div>
    </section>
</main>

<?php
require_once('../app/views/template/footer.php');
?>