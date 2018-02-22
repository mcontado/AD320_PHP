<?php
require('dbconnection.php');
$query = 'SELECT *
          FROM genre';
$statement = $db->prepare($query);
$statement->execute();
$genres = $statement->fetchAll();
$statement->closeCursor();

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
    <script type="text/javascript" src="js/main.js"></script>


</head>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <?php include 'templates/navigation.html' ?>
</nav>

<body>
    <div class="container">
        <h2>Movie Form</h2>

        <form name="wishListForm" action="confirmation.php" onsubmit="return validateForm()" method="post">

            <div class="form-group">
                <label for="movieTitle">Movie Title:</label>
                <input type="text" class="form-control" id="movieTitle" placeholder="Enter movie title" name="movieTitle">
            </div>

            <div class="form-group">
                <label for="releaseYear">Release Year:</label>
                <input type="text" class="form-control" id="releaseYear" placeholder="Enter release year" name="releaseYear">
            </div>

            <div class="form-group">
                <label for="imdbID">IMDB ID: </label>
                <input type="text" class="form-control" id="imdbId" placeholder="Enter IMDB ID" name="imdbId">
            </div>

            <div class="form-group">
                <label for="comment">Description:</label>
                <textarea class="form-control" rows="3" id="description" placeholder="Enter description for movie" ></textarea>
            </div>


            <div class="checkbox-grid">
                <label for="genre">Genre:</label>
                <?php foreach ($genres as $genre) : ?>
                    <div class="checkbox">
                        <label><input type="checkbox" name="genre" value="<?php echo $genre['genreId']; ?>">
                            <?php echo $genre['genreName']; ?> </label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-default">Add to Movie List</button>
        </form>


    </div> <!-- end div container-->

</body>
</html>