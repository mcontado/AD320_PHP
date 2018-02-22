<?php
require('dbconnection.php');
require('./model/movie_db.php');
// List all books
$queryMovies= 'SELECT movieId, title, description, g.genreId, genreName, releaseYear, imdbId
               FROM MOVIE m
               INNER JOIN GENRE g on g.genreId = m.genreId';
$statement= $db->prepare($queryMovies);
$statement->execute();
$movies= $statement->fetchAll();
$statement->closeCursor();

// Get name for selected genre
$queryGenres = 'SELECT * FROM genre';
$sqlGenre= $db->prepare($queryGenres);
$sqlGenre->execute();
$category = $sqlGenre->fetch();
$sqlGenre->closeCursor();
?>

<?php include 'templates/header.html'; ?>

        <h2>My Movie Wish List</h2>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Movie</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>IMDB ID</th>
                <th>Description</th>
                <th></th>
            </tr>
            </thead>

            <tbody>
                <?php foreach ($movies as $movie) : ?>
                    <tr>
                        <td>
                            <?php echo $movie['title']; ?> <br>
                            <a href="related.php?genreId=<?= $movie['genreId']; ?>" target="_self"> Related </a>
                        </td>
                        <td><?php echo $movie['genreName']; ?></td>
                        <td><?php echo $movie['releaseYear']; ?></td>
                        <td><?php echo $movie['imdbId']; ?></td>
                        <td><?php echo $movie['description']; ?></td>
                        <td>
                            <form action="." method="post">
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

<?php include 'templates/footer.html'; ?>

