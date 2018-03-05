<?php
class movies_controller {
    public function showList() {
        $movies = Movie::list_all_movies();
        require_once('view/movies/movielist.php');
    }

    public function deleteMovieById() {
        if (!isset($_POST['movieId']))
            return call('pages', 'error');

        // we use the movie id from POST to get the right movie to delete
        Movie::delete_movie($_POST['movieId']);
    }

    public function addToList() {
        // not dupe imdb id
        if (!(Movie::is_Dupe_IMDB_ID($POST['imdbId']))) {
            $lastInsertedMovieId = Movie::add_movie($_POST['movieTitle'],
                                                    $_POST['releaseYear'],
                                                    $_POST['imdbId'],
                                                    $_POST['description']);

            $genreArrayList = filter_input(INPUT_POST, 'genre_list',
                FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
            $genreArrayListFromMain = filter_input(INPUT_POST, 'genre_list_main');
            $dataArrayGenre = unserialize($genreArrayListFromMain);

            $values = array();

            //Genre options from Movie Form Page
            if ($genreArrayList !== NULL) {
                foreach ($genreArrayList as $key => $value) {
                    $values[] = '(' .$lastInsertedMovieId .',' .intval($value) . ')';
                }
            }

            // Genre List from Main (Home) page
            if ($genreArrayListFromMain !== NULL) {
                foreach ($dataArrayGenre as $key => $value) {
                    $values[] = '(' .$lastInsertedMovieId .',' . $value . ')';
                }
            }

            //The implode function is used to "join elements of an array with a string".
            $strValuesMovieIdGenreId = implode(',', $values);

            // Update the MOVIE_GENRE table based in the latest inserted movieId
            Movie::update_movie_genre($strValuesMovieIdGenreId);

        } else {
            echo 'duplicate imdb id';
        }

    }

    public function showMoviesByGenre() {
        return Movie::movies_by_genre($_POST['movieId']);
    }
}
?>