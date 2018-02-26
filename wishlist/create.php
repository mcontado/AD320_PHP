<?php
require('dbconnection.php');
$query = 'SELECT *
          FROM genres
          ORDER BY genreId';
$statement = $db->prepare($query);
$statement->execute();
$genres = $statement->fetchAll();
$statement->closeCursor();

$queryAuthor = 'select distinct(author) from books';
$stmt = $db->prepare($queryAuthor);
$stmt->execute();
$authors = $stmt->fetchAll();
$stmt->closeCursor();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
    <script type="text/javascript" src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php include 'templates/header.html'?>
        </header>

        <nav>
            <?php include 'templates/navigation.html'?>
        </nav>

        <main>

            <form name="wishListForm" action="confirmation.php" onsubmit="return validateForm()" method="post">
                <fieldset>
                    <legend> WISH LIST FORM </legend>

                    <label> Name </label>
                    <input type="text" name="name">

                    <label> Author </label>
                    <input type="text" name="author" onkeyup="showResult(this.value)">
                    <div id="livesearch"></div>

                    <label> Description </label>
                    <input type="text" name="description">

                    <label> ISBN # </label>
                    <input type="text" name="isbn">

                    <label> Genre </label>
                    <select name="genre">
                        <?php foreach ($genres as $genre) : ?>
                            <option value="<?php echo $genre['genreId']; ?>">
                                <?php echo $genre['genreName']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </fieldset>


                <input type="submit" />
            </form>
        </main>

        <footer>
            <?php include 'templates/footer.html'?>
        </footer>

    </div> <!-- end wrapper-->

</body>
</html>