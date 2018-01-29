<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Wishlist</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css"/>
</head>

<!-- the body section -->
<body>
<div id="wrapper">
    <header>
        <?php include 'templates/header.html'?>
    </header>

    <nav>
        <?php include 'templates/navigation.html'?>
    </nav>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <?php include 'templates/footer.html'?>
    </footer>
</div> <!-- end div wrapper-->
</body>
</html>