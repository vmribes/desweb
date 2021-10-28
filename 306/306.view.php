<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Actividad 281: Formulario Imagenes</title>
    <meta name="description" content="PHP, PHPStorm">
    <meta name="author" content="Homer Simpson">
</head>
<body>
<form action="306.php"  enctype="multipart/form-data" method="post">
    <label for="firstname">Nombre</label>
    <input type="text" name="firstname" value="">
    <br />
    <label for="lastname">Apellido</label>
    <input type="text" name="lastname" value="">
    <br />
    <label for="phone">Número de Tlfn</label>
    <input type="text" name="phone" value="">
    <br />
    <label for="email">Correo Electrónico</label>
    <input type="text" name="email" value="">
    <br />
    <label>Subir un fichero: </label><input name="fileUpload" type="file" />
    <br />
    <input type="submit" value="Enviar">
</form>
<?php if ($errors == null && $post == true): ?>
    <p>Todos los campos están rellenados correctamente :D</p>
<?php else: ?>
    <?php
    foreach ($errors as $error){
        ?><p><?php echo $error;?></p><?php
    }
    ?>

    <?php if(!empty($url)){
        ?>
        <p>La imagen:</p>
        <img src="<?php echo $url ?>"/>
        <?php
    }
    ?>
<?php endif ?>

</body>
</html>