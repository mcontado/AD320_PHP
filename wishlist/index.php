<?php

$INTRO = <<< INTRO
Hello there! BookWishlist is an easy web application that helps you to collect and keep track of the books you want to read. 
You can easily organize your wishlist by simply adding the book information on the WISH LIST page. 
Feel free to navigate to WISH LIST button above and add it.
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
        <?php include 'templates/header.html'?>
    </header>

    <nav>
        <?php include 'templates/navigation.html'?>
    </nav>

    <main>
        <br/>
        <p> <?php echo $INTRO ?> <br> </p>
    </main>

    <footer>
        <?php include 'templates/footer.html'?>
    </footer>

</div> <!-- end wrapper-->

</body>
</html>

