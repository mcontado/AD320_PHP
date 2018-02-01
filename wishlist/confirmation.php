<?php
require('dbconnection.php');
 $name = filter_input(INPUT_POST, 'name');
 $author = filter_input(INPUT_POST, 'author');
 $genre = filter_input(INPUT_POST, 'genre');
 $isbn = filter_input(INPUT_POST, 'isbn');
 $description = filter_input(INPUT_POST, 'description');


    $query = 'INSERT INTO books
                 (bookId, name, author, genreId, isbn, description)
          VALUES
                (NULL, :name, :author, :genre, :isbn, :description)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':genre', $genre);
    $statement->bindValue(':isbn', $isbn);
    $statement->bindValue(':description', $description);

    $statement->execute();
    $statement->closeCursor();


?>

<!DOCTYPE html>
<html>
<head>
    <title>WISHLIST</title>
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
            <?php

            echo "<br/> <p>";
            echo "The following book has been added to the wish list: " . "<br/><br/>";
            echo "Name :". $name . "<br />";
            echo "Author: ". $author . "<br/>";
            echo "Description: ". $description . "<br/>";
            echo "Genre: " . $genre . " <br/>";
            echo "ISBN: " .$isbn ."<br/> <br/>";

            echo "</p>";
            ?>
        </main>

        <footer>
            <?php include 'templates/footer.html'?>
        </footer>

    </div> <!-- end wrapper-->

</body>
</html>

