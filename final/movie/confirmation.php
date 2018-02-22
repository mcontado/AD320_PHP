<?php
header("refresh: 5; url=index.php");
require('dbconnection.php');

$movieTitle = $_POST['movieTitle'];
$releaseYear = $_POST['releaseYear'];
$imdbId = $_POST['imdbId'];
$description = $_POST['description'];
$genre = $_POST['genre'];

$dupeImdbIDQuery = "select  *
             from MOVIE 
             where imdbId = '$imdbId'";
$stmtDupe = $db->prepare($dupeImdbIDQuery);
$stmtDupe->execute();
$rowCount = $stmtDupe->rowCount();

if ($rowCount > 0) {
    // There is an existing IMDB ID.
    $isDupeIMDBID = true;
} else {
    $isDupeIMDBID = false;
    // No existing IMDB ID, therefore add it to the MOVIE table
    $query = 'INSERT INTO MOVIE
                 (movieId, title, releaseYear, imdbId, description, genreId)
              VALUES
                (NULL, :movieTitle, :releaseYear, :imdbId, :description, :genreId);';

    $statement = $db->prepare($query);
    $statement->bindValue(':movieTitle', $movieTitle);
    $statement->bindValue(':releaseYear', $releaseYear);
    $statement->bindValue(':imdbId', $imdbId);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':genreId', $genre);

    $statement->execute();
    $statement->closeCursor();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MOVIE WISHLIST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <?php include 'templates/navigation.html' ?>
    </nav>

    <div class="container" style="margin-top:50px">

        <?php
        if ($isDupeIMDBID) {
            echo "<br/> <p>";
            echo "Duplicate IMDB ID, please enter unique IMDB ID for each movie. ";
            echo "</p>";
        } else {
            echo "<br/> <p>";
            echo "The following book has been added to the Movie Wish List: " . "<br/><br/>";
            echo "Movie Title :". $movieTitle . "<br />";
            echo "Release Year: ". $releaseYear . "<br/>";
            echo "Description: ". $description . "<br/>";
            echo "Genre: " . $genre . " <br/>";
            echo "IMDB ID: " .$imdbId ."<br/> <br/>";

            echo "</p>";
        }
        echo "<br/> <p>";
        echo "Redirecting to Home page in 5 seconds...";
        echo "</p>";
        ?>

    </div> <!-- end div container-->


</body>
</html>
