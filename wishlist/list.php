<?php
require('dbconnection.php');

// List all books
$queryBooks = 'SELECT name, author, isbn, b.genreId, genreName, description
               FROM books b
               INNER JOIN genres g on g.genreId = b.genreId';
$statement= $db->prepare($queryBooks);
$statement->execute();
$books = $statement->fetchAll();
$statement->closeCursor();

// Get name for selected genre
$queryGenres = 'SELECT * FROM genres';
$sqlGenre= $db->prepare($queryGenres);
$sqlGenre->execute();
$category = $sqlGenre->fetch();
$sqlGenre->closeCursor();
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
                    <td>
                        <?php echo $book['name']; ?> <br>
                        <a href="related.php?genreId=<?= $book['genreId']; ?>" target="_self"> Related </a>
                    </td>
                    <td><?php echo $book['author']; ?></td>
                    <td class="genre"><?php echo $book['genreName']; ?></td>
                    <td class="isbn"><?php echo $book['isbn']; ?></td>
                    <td><?php echo $book['description']; ?></td>
                </tr>
                 <?php endforeach; ?>
        </table>
    </main>

    <footer>
        <?php include 'templates/footer.html'?>
    </footer>

</div> <!-- end wrapper-->

</body>
</html>

