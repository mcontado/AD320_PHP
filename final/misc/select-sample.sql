# Query for selecting all movies regardless of genre category
SELECT distinct m.movieId, title, description, releaseYear, imdbId
FROM MOVIE m
  LEFT JOIN MOVIE_GENRE mg on mg.movieId = m.movieId
  LEFT JOIN GENRE g on g.genreId = mg.genreId;


# Query for each movie to get the genre id and genre name
SELECT mg.movieId, g.genreId, genreName from MOVIE_GENRE mg
INNER JOIN GENRE g on g.genreId = mg.genreId
WHERE mg.movieId = 7; # 7 should be a parameter for movieId

# Query for getting related genre category
SELECT DISTINCT m.movieId, title, description, releaseYear, imdbId
from MOVIE m
LEFT JOIN MOVIE_GENRE mg on mg.movieId = m.movieId
WHERE mg.genreId in (select genreId from MOVIE_GENRE where movieId = 7); # 7 should be a parameter for movieId

