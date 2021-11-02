<?php declare(strict_types=1); ?>

<?php
require './src/Movie.php';
require "helpers.php";

$id = 0;

if(isset($_GET["id"])){
    $id = $_GET['id'];
}

$movieSelected = null;

$title = "";
$releaseDate = "";
$overview = "";
$rating = 0;
$poster = "";

if($id != 0){
    $pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
    $stmt = $pdo->query ('SELECT * from movie WHERE `id` = '.$id);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row=$stmt->fetch()) {
        $movieSelected = new Movie($row['id'],$row['title'],$row['overview'], $row['release-date'], $row['rating'], $row['poster']);
    }

    $title = $movieSelected->getTitle();
    $releaseDate = $movieSelected->getReleaseDate();
    $overview = $movieSelected->getOverview();
    $rating = $movieSelected->getStarsRating();
    $poster = $movieSelected->getPoster();
}
$msjError = "";
if (isPost()) {
    if(array_key_exists("otra",$_POST)){
        global $id;
        $id = 0;
    }

    if(array_key_exists("idEliminar",$_POST)){
        try{
            if($_POST["idEliminar"] === ""){
                throw new Exception();
            }
            global $id;
            $id = $_POST["idEliminar"];

            $pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
            $stmt = $pdo->query ('SELECT * from movie WHERE `id` = '.$id);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            while ($row=$stmt->fetch()) {
                $movieSelected = new Movie($row['id'],$row['title'],$row['overview'], $row['release-date'], $row['rating'], $row['poster']);
            }
            if($movieSelected == null){
                throw new Exception();
            }

            $title = $movieSelected->getTitle();
            $releaseDate = $movieSelected->getReleaseDate();
            $overview = $movieSelected->getOverview();
            $rating = $movieSelected->getStarsRating();
            $poster = $movieSelected->getPoster();

        }catch (Exception $e){
            global $id;
            $id = 0;
            $msjError = "No hemos encontrado ninguna película con esa ID";
        }
    }

    if(array_key_exists("eliminar",$_POST)){
        global $id;
        $id = $_POST["id"];
        $pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'DELETE FROM movie WHERE id = ?';
        $pdo->prepare($sql)->execute([$id]);
        $id = 0;
    }
}

require "./views/movies-delete.view.php";
?>