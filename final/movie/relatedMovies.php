<?php
require('dbconnection.php');
require('model/Movie.php');

$movieId = $_GET['movieId'];
$moviesByGenre = Movie::movies_by_genre($movieId);

$action = filter_input(INPUT_POST, 'action');

if ($action == 'delete_movie') {
    $movieId = filter_input(INPUT_POST, 'movieId', FILTER_VALIDATE_INT);
    if ($movieId != NULL) {
        Movie::delete_movie($movieId);
        header("Location: ./relatedMovies.php?movieId=$movieId");
    }
}
?>

<?php include 'templates/header.html'; ?>

<h3>
    Genre:
    <?php
    $genresPerMovie = Movie::genres_per_movie($movieId);

    foreach ($genresPerMovie as $genre) :
        $strGenres .= $genre['genreName'] . ',';
    endforeach;

    $strGenres = rtrim($strGenres, ',');
    echo $strGenres;
    ?>
</h3>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Movie</th>
            <th>Release Year</th>
            <th>IMDB ID</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($moviesByGenre as $movie) : ?>
            <tr>
                <td><?php echo $movie['title']; ?> </td>
                <td><?php echo $movie['releaseYear']; ?></td>
                <td><?php echo $movie['imdbId']; ?></td>
                <td><?php echo $movie['description']; ?></td>
                <td>
                    <form action="relatedMovies.php" method="post">
                        <input type="hidden" name="action"
                               value="delete_movie">

                        <input type="hidden" name="movieId"
                               value="<?php echo $movie['movieId']; ?>">

                        <button type="submit" class="btn btn-default">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-default" onclick="window.history.back();" > Go Back </button>
    <br> <br>

<?php include 'templates/footer.html'; ?>

