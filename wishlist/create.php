<?php
require('dbconnection.php');
$query = 'SELECT *
          FROM genres
          ORDER BY genreId';
$statement = $db->prepare($query);
$statement->execute();
$genres = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
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

            <form action="confirmation.php" method="post">
                <fieldset>
                    <legend> WISH LIST FORM </legend>

                    <label> Name </label>
                    <input type="text" name="name" required>

                    <label> Author </label>
                    <input type="text" name="author" required>

                    <label> Description </label>
                    <input type="text" name="description" required>

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