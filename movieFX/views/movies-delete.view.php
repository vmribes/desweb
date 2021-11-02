<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="utf-8">
    <title>Actividad 274: Formulari</title>
    <meta name="description" content="PHP, PHPStorm">
    <meta name="author" content="Homer Simpson">
    <style>
        body {
            font-family: "Bitstream Vera Serif"
        }
    </style>
</head>

<body>
<?php if ($id != 0) { ?>

<table>
    <tr>
        <th>Title</th>
        <td><?= $title ?></td>
    </tr>
    <tr>
        <th>Overview</th>
        <td><?= $overview ?></td>
    </tr>
    <tr>
        <th>Release date</th>
        <td><?= date("d/m/Y", strToTime($releaseDate)) ?></td>
    </tr>
    <tr>
        <th>Rating</th>
        <td><?= $rating ?></td>
    </tr>
    <tr>
        <th>Poster</th>
        <td><img src="<?php echo $poster; ?>" /></td>
    </tr>
</table>
<form action="" method="post" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="submit" value="Eliminar" name="eliminar">
    <input type="submit" value="Eliminar Otra" name="otra">

</form>
<?php }else{
    ?>
    <h1>No hay ninguna película seleccionada</h1>
    <h3>Por favor, introduzca la id de la película que desea eliminar</h3>
    <form action="" method="post" >
        <input type="number" name="idEliminar" id="idEliminar"><input type="submit" value="Buscar">
    </form>
    <p><?php if($msjError != ""){echo $msjError;} ?></p>
<?php } ?>
<br>
<button><a href='./index.php'>Cancelar</a></button>

</body>

</html>