<?php declare(strict_types=1); ?>

<?php
require './src/Movie.php';
require "helpers.php";

$id = $_GET['id'];
$pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
$stmt = $pdo->query ('SELECT * from movie WHERE `id` = '.$id);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$movieSelected = null;

while ($row=$stmt->fetch()) {
    $movieSelected = new Movie($row['id'],$row['title'],$row['overview'], $row['release-date'], $row['rating'], $row['poster']);
}


$title = $movieSelected->getTitle();
$releaseDate = $movieSelected->getReleaseDate();
$overview = $movieSelected->getOverview();
$rating = $movieSelected->getStarsRating();
$poster = $movieSelected->getPoster();

$errors = [];

$isPost = false;

if (isPost()) {
    $isPost = true;

    if (validate_string($_POST["title"], 1, 100 ))
        $title = clean($_POST["title"]);
    else
        $errors[] = "Error en validar el títol";

    if (validate_string($_POST["overview"], 1, 1000 ))
        $overview = clean($_POST["overview"]);
    else
        $errors[] = "Error en validar la sinopsi";


    if (!empty($_POST["release-date"]) && (validate_date($_POST["release-date"])))
        $releaseDate = $_POST["release-date"];
    else
        $errors[] = "Cal indicar una data correcta";

    $ratingTemp = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT);

    if (!empty($ratingTemp) && ($ratingTemp >0 && $ratingTemp<=5))
        $rating = $ratingTemp;
    else
        $errors[] = "El rating ha de ser un enter entre 1 i 5";

    //file
    try{
        if($_FILES["fileUpload"] != null) {
             if (!checkIfFileOk($_FILES["fileUpload"])) {
                    $errors[] = "Se ha subido mal el poster";
                    throw new Exception();
                }

                if ($_FILES["fileUpload"]['size'] > 1048576) {
                    $errors[] = "El tamaño del poster es muy grande";
                    throw new Exception();
                }

                if ($_FILES["fileUpload"]['type'] != 'image/png') {
                    $errors[] = "El formato del poster es incorrecto (ha de ser png)";
                    throw new Exception();
                }
                $randomName = date("Y-m-d:h:m:s");
                $randomName = $randomName . ".png";

                $_FILES["fileUpload"]['name'] = $randomName;
                $url = "./uploads/" . $_FILES["fileUpload"]['name'];
                $poster = $_FILES["fileUpload"]['name'];
                move_uploaded_file($_FILES["fileUpload"]['tmp_name'], $url);
            } else {
                echo "es la misma mierda de siempre";
            }
    }catch (Exception $e){
    }


    if(is_empty($errors)){
        $pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'UPDATE movie SET title = ?, overview = ?, `release-date` = ?, rating = ?, poster = ? WHERE id = ?';
        $pdo->prepare($sql)->execute([$title, $overview, $releaseDate, $rating, $poster, $id]);
    }
}

require "./views/movies-edit.view.php";
