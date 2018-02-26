<?php
//header("refresh: 5; url=index.php");
require('dbconnection.php');
require('model/Movie.php');

$movieTitle = $_POST['movieTitle'];
$releaseYear = $_POST['releaseYear'];
$imdbId = $_POST['imdbId'];
$description = $_POST['description'];

$isDupeImdbID = Movie::is_Dupe_IMDB_ID($imdbId);

if (!$isDupeImdbID) {
    $lastInsertedMovieId = Movie::add_movie($movieTitle, $releaseYear, $imdbId, $description);

    $genreArrayList = filter_input(INPUT_POST, 'genre_list',
        FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

    $values = array();
    if ($genreArrayList !== NULL) {
        foreach ($genreArrayList as $key => $value) {
            $values[] = '(' .$lastInsertedMovieId .',' .intval($value) . ')';
        }
    }

    //The implode function is used to "join elements of an array with a string".
    $strValuesMovieIdGenreId = implode(',', $values);

    // Update the MOVIE_GENRE table based in the latest inserted movieId
    Movie::update_movie_genre($strValuesMovieIdGenreId);
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
            echo "Genre: " . $genre . " <br/>";
            echo "IMDB ID: " .$imdbId ."<br/> <br/>";

            echo "</p>";
        }
        echo "<br/> <p>";
        echo "Redirecting to Home page in 5 seconds...";
        echo "</p>";
        ?>

<?php include 'templates/footer.html'; ?>
