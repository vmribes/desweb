<?php
require './src/Movie.php';
require './src/Plan.php';
require './src/User.php';

try{
    $pdo = new PDO("mysql:host=localhost; dbname=movieFX", "dbuser", "1234");
    $stmt = $pdo->query ('SELECT * from movie');
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $movies = [];
    while ($row=$stmt->fetch()) {
        $movie = new Movie($row['id'],$row['title'],$row['overview'], $row['release-date'], $row['rating'], $row['poster']);
        array_push($movies, $movie);
    }
    require './views/index.view.php';
}catch (PDOException $e) {
    die($e-> getMessage ());
}
//$pdo = new PDO('sqlite:/path/db/users.db');
//$stmt = $pdo->prepare('SELECT name FROM users WHERE id = :id');
//$stmt->setFetchMode(PDO::FETCH_ASSOC);


//$movie1 = new Movie(0,"movie1","overview", "2020-12-31", "3.7", "movie.png");
//$movie2 = new Movie(1,"movie2","overview", "2020-12-31", "3.7", "movie.png");
//$movie3 = new Movie(2,"movie3","overview", "2020-12-31", "3.7", "movie.png");
//
//
//$movies = array($movie1, $movie2, $movie3);
//
//

?>