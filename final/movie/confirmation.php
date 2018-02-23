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

<?php include 'templates/header.html'; ?>

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

<?php include 'templates/footer.html'; ?>
