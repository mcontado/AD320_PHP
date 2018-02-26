<?php

class Movie {
    public static function list_all_movies() {
        $db = Database::getDB();

        $queryMovies= 'SELECT movieId, title, description, g.genreId, genreName, releaseYear, imdbId
               FROM MOVIE m
               INNER JOIN GENRE g on g.genreId = m.genreId';
        $statement= $db->prepare($queryMovies);
        $statement->execute();
        $movies= $statement->fetchAll();
        $statement->closeCursor();

        return $movies;
    }

    public static function movies_by_genre($genreId) {
        $db = Database::getDB();

        // Select all movies related to selected genre
        $queryAllMoviesByGenre = "SELECT movieId, title, description, g.genreId, genreName, releaseYear, imdbId
               FROM MOVIE m
               INNER JOIN GENRE g on g.genreId = m.genreId 
               WHERE g.genreId = :genreId";
        $statement= $db->prepare($queryAllMoviesByGenre);
        $statement->bindValue(':genreId', $genreId);
        $statement->execute();
        $moviesByGenre = $statement->fetchAll();
        $statement->closeCursor();

        return $moviesByGenre;
    }

    public static function add_movie($movieTitle, $releaseYear, $imdbId, $description, $genre) {
        $db = Database::getDB();

        $query = 'INSERT INTO MOVIE
                 (movieId, title, releaseYear, imdbId, description, genreId)
              VALUES
                (NULL, :movieTitle, :releaseYear, :imdbId, :description, :genreId);';

        $statement = $db->prepare($query);
        $statement->bindValue(':movieTitle', $movieTitle);
        $statement->bindValue(':releaseYear', $releaseYear);
        $statement->bindValue(':imdbId', $imdbId);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':genreId', $genre);

        $statement->execute();
        $statement->closeCursor();

    }

    public static function delete_movie($movieId) {
        $db = Database::getDB();

        $query = 'DELETE FROM MOVIE
              WHERE movieId = :movieId';
        $statement = $db->prepare($query);
        $statement->bindValue(':movieId', $movieId);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function select_all_genres() {
        $db = Database::getDB();

        $query = 'SELECT * FROM genre';
        $statement = $db->prepare($query);
        $statement->execute();
        $genres = $statement->fetchAll();
        $statement->closeCursor();

        return $genres;
    }

    public static function get_genre_by_id($genreId) {
        $db = Database::getDB();

        $query = 'SELECT genreName FROM GENRE WHERE genreId = :genreId';
        $statement = $db->prepare($query);
        $statement->bindValue(':genreId', $genreId);
        $statement->execute();
        $genreName = $statement->fetchColumn();
        $statement->closeCursor();

        return $genreName;
    }

    public static function is_Dupe_IMDB_ID($imdbId) {
        $db = Database::getDB();

        $dupeImdbIDQuery = "SELECT  * FROM MOVIE 
             WHERE imdbId = :imdbId";
        $statement = $db->prepare($dupeImdbIDQuery);
        $statement->bindValue(':imdbId', $imdbId);
        $statement->execute();
        $rowCount = $statement->rowCount();

        if ($rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }

}

?>