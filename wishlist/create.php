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

                    <label> ISBN # </label>
                    <input type="text" name="isbn">

                    <label> Genre </label>
                    <select name="genre">
                        <option>Non-fiction</option>
                        <option>Horror</option>
                        <option>Mystery</option>
                        <option>Classic</option>
                        <option>Other</option>
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