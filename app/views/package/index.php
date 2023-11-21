<?php

?>

<?php
require_once('../app/views/template/header.php');
?>

<div class="registrar_paquete">
    <button onclick=" location.href='?controller=package&action=registrar' " class="add">Registrar Paquete</button>
</div>

<div class="container__package">
    <div class="list">
        <?php
        foreach ($paquetes as $paquete) {
        ?>
            <div class="item">

                <div class="img">
                    <img src="<?php echo $paquete->foto; ?>">
                </div>
                <div class="content">
                    <div class="title"><?php echo $paquete->nombre; ?></div>
                    <div class="descripcion">
                        <?php echo $paquete->descripcion; ?>
                    </div>
                    <div class="price">$ <?php echo $paquete->precio; ?> </div>
                    <botton onclick=" location.href='?controller=booking&action=index' " class="add">Add card</botton>
                </div>
            </div>
        <?php } ?>
    </div>
    <ul class="listPage">
            
    </ul>
</div>


<?php
require_once('../app/views/template/footer.php');
?>