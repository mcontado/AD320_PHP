<?php
require('dbconnection.php');

// List all books
$queryMovies= 'SELECT title, description, g.genreId, genreName, releaseYear, imdbId
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
<!DOCTYPE html>
<html>
<head>
    <title>MOVIE WISHLIST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <?php include 'templates/navigation.html' ?>
</nav>

<body>
    <div class="container" style="margin-top:50px">
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
                        <td> <button type="submit" class="btn btn-default">Delete</button> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

