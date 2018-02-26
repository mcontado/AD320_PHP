<?php

function delete_movie($movieId) {
    global $db;
    $query = 'DELETE FROM MOVIE
              WHERE movieId = :movieId';
    $statement = $db->prepare($query);
    $statement->bindValue(':movieId', $movieId);
    $statement->execute();
    $statement->closeCursor();
}

function select_all_genres() {
    global $db;
    $query = 'SELECT * FROM genre';
    $statement = $db->prepare($query);
    $statement->execute();
    $genres = $statement->fetchAll();
    $statement->closeCursor();
    return $genres;
}

function get_genre_by_id($genreId) {
    global $db;
    $query = 'SELECT genreName FROM GENRE WHERE genreId = :genreId';
    $statement = $db->prepare($query);
    $statement->bindValue(':genreId', $genreId);
    $statement->execute();
    $genreName = $statement->fetchColumn();
    $statement->closeCursor();
    return $genreName;
}

function is_Dupe_IMDB_ID($imdbId) {
    global $db;
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

function add_movie($movieTitle, $releaseYear, $imdbId, $description, $genre) {
    global $db;

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

function list_all_movies() {
    global $db;

    $queryMovies= 'SELECT movieId, title, description, g.genreId, genreName, releaseYear, imdbId
               FROM MOVIE m
               INNER JOIN GENRE g on g.genreId = m.genreId';
    $statement= $db->prepare($queryMovies);
    $statement->execute();
    $movies= $statement->fetchAll();
    $statement->closeCursor();

    return $movies;
}

function movies_by_genre($genreId) {
    global $db;

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

?>