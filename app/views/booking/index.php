<?php
?>

<?php
require_once('../app/views/template/header.php');
?>

<section class="container__formulario">
    <form action="?controller=booking&action=nuevo" method="post" >
        <?php foreach($usuario as $user){ ?>

        <div class="campos">
            <label>ID Usuario</label>
            <input type="text" name="id_usuario" id="id_usuario" readonly="true" value="<?php echo $user->id;?>">
        </div>
        <div class="campos">
            <label>Nombre</label>
            <input type="text" name="nombre" id="nombre" readonly="true" value="<?php echo $user->nombre;?>">
        </div>
        <div class="campos">
            <label>Correo</label>
            <input type="text" name="correo" id="correo" readonly="true" value="<?php echo $user->correo;?>">
        </div>
        <?php } ?>

        <div class="campos">
            <label >Telefono</label>
            <input type="text" name="telefono" id="telefono">
        </div>
        <div class="campos">
            <label>Direccion</label>
            <input type="text" name="direccion" id="direccion">
        </div>
        <div class="campos">
            <label>Paquete</label>
            <select required>
                <option value="" selected>Selecione un valor</option>
                    <?php foreach ($paquetes as $paquete) { ?>
                        <option value="<?php echo $paquete->id; ?>"><?php echo $paquete->nombre; ?></option>
                    <?php } ?>
            </select>
        </div>
        <div class="campos">
            <label>Adultos</label>
            <input type="text" name="adultos" id="adultos">
        </div>
        <div class="campos">
            <label>Ninos</label>
            <input type="text" name="ninos" id="ninos">
        </div>
        <div class="campos">
            <label>Fecha</label>
            <input type="date" name="fecha" id="fecha" >
        </div>
        <button type="submit">Enviar</button>
    </form>
</section>

<?php
require_once('../app/views/template/footer.php');
?>