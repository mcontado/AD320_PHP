<?php
require('dbconnection.php');
require('model/movie_db.php');

$movies = list_all_movies();
?>

<?php include 'templates/header.html'; ?>

        <h2>My WatchList</h2>

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
                            <a href="relatedMovies.php?genreId=<?= $movie['genreId']; ?>" target="_self"> Related </a>
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
