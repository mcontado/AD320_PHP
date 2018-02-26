<?php
header("refresh: 5; url=index.php");

require('dbconnection.php');
require('model/Movie.php');

$movieTitle = $_POST['movieTitle'];
$releaseYear = $_POST['releaseYear'];
if (empty($releaseYear)) {
    $releaseYear = NULL;
}
$imdbId = $_POST['imdbId'];
$description = $_POST['description'];
$genre = $_POST['genre'];

$genreName = Movie::get_genre_by_id($genre);

$isDupeImdbID = Movie::is_Dupe_IMDB_ID($imdbId);

if (!$isDupeImdbID) {
    Movie::add_movie($movieTitle, $releaseYear, $imdbId, $description, $genre);
}

?>

<?php include 'templates/header.html'; ?>

        <?php
        if ($isDupeImdbID) {
            echo "<br/> <p>";
            echo "Duplicate IMDB ID, please enter unique IMDB ID for each movie. ";
            echo "</p>";
        } else {
            echo "<br/> <p>";
            echo "The following book has been added to the Movie Wish List: " . "<br/><br/>";
            echo "Movie Title :". $movieTitle . "<br />";
            echo "Release Year: ". $releaseYear . "<br/>";
            echo "Description: ". $description . "<br/>";
            echo "Genre: " . $genreName . " <br/>";
            echo "IMDB ID: " .$imdbId ."<br/> <br/>";

            echo "</p>";
        }
        echo "<br/> <p>";
        echo "Redirecting to Home page in 5 seconds...";
        echo "</p>";
        ?>

<?php include 'templates/footer.html'; ?>
