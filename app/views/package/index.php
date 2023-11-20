<?php

?>

<?php
require_once('../app/views/template/header.php');
?>

<section class="container__formulario">
    <form action="?controller=package&action=nuevo" method="post" enctype="multipart/form-data">
        <div class="campos">
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre">
        </div>
        <div class="campos">
            <label>Descripcion</label>
            <input type="text" name="descripcion" id="descripcion">
        </div>
        <div class="campos">
            <label>Dias</label>
            <input type="text" name="dias" id="dias">
        </div>
        <div class="campos">
            <label >Precio</label>
            <input type="text" name="precio" id="precio">
        </div>
        <div class="campos">
            <label>Destino</label>
            <input type="text" name="destino" id="destino">
        </div>
        <div class="campos">
            <label>Imagen</label>
            <input type="file" name="foto" id="foto">
        </div>
        <button type="submit">Enviar</button>
    </form>
</section>

<?php
require_once('../app/views/template/footer.php');
?>