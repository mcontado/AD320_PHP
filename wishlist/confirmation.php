<?php
header("refresh: 5; url=index.php");
require('dbconnection.php');

$name = $_POST['name'];
$author = $_POST['author'];
$genre = $_POST['genre'];
$isbn = $_POST['isbn'];
$description = $_POST['description'];

$dupeIsbnQuery = "select  *
             from books 
             where isbn = '$isbn'";
$stmtDupe = $db->prepare($dupeIsbnQuery);
$stmtDupe->execute();
$rowCount = $stmtDupe->rowCount();

if ($rowCount > 0) {
    // There is an existing ISBN number.
    $isDupeISBN = true;
} else {
    $isDupeISBN = false;
    // No existing ISBN, therefore add it to the books table
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

}

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
            if ($isDupeISBN) {
                echo "<br/> <p>";
                echo "Duplicate ISBN, please enter unique ISBN for each book. ";
                echo "</p>";
            } else {
                echo "<br/> <p>";
                echo "The following book has been added to the wish list: " . "<br/><br/>";
                echo "Name :". $name . "<br />";
                echo "Author: ". $author . "<br/>";
                echo "Description: ". $description . "<br/>";
                echo "Genre: " . $genre . " <br/>";
                echo "ISBN: " .$isbn ."<br/> <br/>";

                echo "</p>";
            }
            echo "<br/> <p>";
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

