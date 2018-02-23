<?php
require('dbconnection.php');
$query = 'SELECT *
          FROM genre';
$statement = $db->prepare($query);
$statement->execute();
$genres = $statement->fetchAll();
$statement->closeCursor();

?>

<?php include 'templates/header.html'; ?>

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
                <textarea class="form-control" rows="3" id="description" placeholder="Enter description for movie" name="description"></textarea>
            </div>

            <div class="form-group">
                <label> Genre: </label>
                <select class="form-control" name="genre">
                    <?php foreach ($genres as $genre) : ?>
                        <option value="<?php echo $genre['genreId']; ?>">
                            <?php echo $genre['genreName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br>

            <button type="submit" class="btn btn-default">Add to Movie List</button>
        </form>
    <br>
<?php include 'templates/footer.html'; ?>