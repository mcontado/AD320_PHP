<?php header("refresh: 5; url=index.php");

 require('dbconnection.php');

            $name = $_POST['name'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];
            $isbn = $_POST['isbn'];
            $description = $_POST['description'];

            // Add the book to the database
            $query = 'INSERT INTO books
                 (name, author, genre, isbn, description)
              VALUES
                 (:name, :author, :genre, :isbn, :description)';
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
            echo "Redirecting to Home page in 5 seconds...";
            echo "</p>";
            ?>
        </main>

        <footer>
            <?php include 'templates/footer.html'?>
        </footer>

    </div> <!-- end wrapper-->

</body>
</html>

