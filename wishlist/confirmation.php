<?php header("refresh: 5; url=index.php")?>

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
            header( "Refresh:5; url=index.php" );
            $name = $_POST['name'];
            $author = $_POST['author'];
            $genre = $_POST['genre'];
            $isbn = $_POST['isbn'];


            echo "<br/> <p>";
            echo "The following book has been added to the wish list: " . "<br/><br/>";
            echo "Name :". $name . "<br />";
            echo "Author: ". $author . "<br/>";
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

