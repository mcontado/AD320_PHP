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

?>