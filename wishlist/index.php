<?php

$INTRO = <<< INTRO
Hello there! BookWishlist is an easy web application that helps you to collect and keep track of the books you want to read. 
You can easily organize your wishlist by simply adding the book information on the WISHLIST page. 
Go ahead and add it to your wishlist.
INTRO;
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
        <?php include 'templates/header.php'?>
    </header>

    <nav>
        <?php include 'templates/navigation.php'?>
    </nav>

    <main>
        <p> <?php echo $INTRO ?> <br> </p>
    </main>

    <footer>
        <?php include 'templates/footer.php'?>
    </footer>

</div> <!-- end wrapper-->

</body>
</html>

