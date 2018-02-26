<?php
require('dbconnection.php');
require('model/Movie.php');

$genreId = $_GET['genreId'];
$moviesByGenre = Movie::movies_by_genre($genreId);
$genre = Movie::get_genre_by_id($genreId);

?>

<?php include 'templates/header.html'; ?>

<h2><?php echo $genre; ?> </h2>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Movie</th>
            <th>Release Year</th>
            <th>IMDB ID</th>
            <th>Description</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($moviesByGenre as $movie) : ?>
            <tr>
                <td><?php echo $movie['title']; ?> </td>
                <td><?php echo $movie['releaseYear']; ?></td>
                <td><?php echo $movie['imdbId']; ?></td>
                <td><?php echo $movie['description']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-default" onclick="window.history.back();" > Go Back </button>
    <br> <br>

<?php include 'templates/footer.html'; ?>

