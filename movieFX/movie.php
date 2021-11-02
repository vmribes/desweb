<?php
require './src/Movie.php';

$id = $_GET['id'];
$pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
$stmt = $pdo->query ('SELECT * from movie WHERE `id` = '.$id);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$movieSelected = null;

while ($row=$stmt->fetch()) {
    $movieSelected = new Movie($row['id'],$row['title'],$row['overview'], $row['release-date'], $row['rating'], $row['poster']);
}
require "./views/movie.view.php";
?>
