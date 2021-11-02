<p>Id: <?php echo $movieSelected->getId(); ?></p>
<p>Title: <?php echo $movieSelected->getTitle(); ?></a></p>
<p>Overview: <?php echo $movieSelected->getOverview(); ?></p>
<p>Release Date: <?php echo $movieSelected->getReleaseDate(); ?></p>
<p>Stars Rating: <?php echo $movieSelected->getStarsRating(); ?></p>
<p>Poster: <?php echo $movieSelected->getPoster(); ?></p>
<button><a href='./movies-edit.php?id=<?php echo $movieSelected->getId(); ?>'>Editar Película</a></button>
<button><a href='./movies-delete.php?id=<?php echo $movieSelected->getId(); ?>'>Eliminar Película</a></button>


<button><a href="./index.php">Volver</a></button>
