<?php
require('dbconnection.php');

$genreId = $_GET['genreId'];

// List all books related to selected genre
$queryBooks = "SELECT name, author, isbn, b.genreId, genreName, description
               FROM books b
               INNER JOIN genres g on g.genreId = b.genreId 
               WHERE b.genreId = '$genreId'";
$statement= $db->prepare($queryBooks);
$statement->execute();
$books = $statement->fetchAll();
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
        <section>
            <table>
                <tr>
                    <th>Book</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>ISBN</th>
                    <th>Description</th>
                </tr>

                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td> <?php echo $book['name']; ?> <br> </td>
                        <td><?php echo $book['author']; ?> </td>
                        <td class="genre"><?php echo $book['genreName']; ?></td>
                        <td class="isbn"><?php echo $book['isbn']; ?></td>
                        <td><?php echo $book['description']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <input type="button" onclick="window.history.back();" value="Go Back"/>

        </section>

    </main>

    <footer>
        <?php include 'templates/footer.html'?>
    </footer>

</div> <!-- end wrapper-->

</body>
</html>

