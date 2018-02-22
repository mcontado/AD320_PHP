create table GENRE
(
	genreId int auto_increment
		primary key,
	genreName varchar(50) not null
)
engine=InnoDB
;

create table MOVIE
(
	movieId int auto_increment
		primary key,
	title varchar(255) not null,
	description varchar(10000) null,
	categoryId int null,
	releaseYear int null,
	imdbId varchar(10) null
)
engine=InnoDB
;

create table MOVIE_GENRE
(
	movieId int not null,
	genreId int not null
)
engine=InnoDB
;

