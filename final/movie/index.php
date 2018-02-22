<?php

 $ch = curl_init();

 $url = "https://api.themoviedb.org/3/discover/movie?page=1&include_video=false&include_adult=false&sort_by=popularity.desc&language=en-US&api_key=47096e9f413866406e8887e56411ced5";

 $baseImageUrl = "http://image.tmdb.org/t/p/w185/";

 //Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, $url);
 //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 //Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 //Set method to GET
curl_setopt($ch, CURLOPT_HTTPGET, true);

//Execute the request.
    $data = curl_exec($ch);

    //Close the cURL handle.
    curl_close($ch);
    $json_output = json_decode($data);

    $results = $json_output->results;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>MOVIE WISHLIST</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="height:1500px">

<nav class="navbar navbar-inverse navbar-fixed-top">
    <?php include 'templates/navigation.html' ?>
</nav>

<div class="container" style="margin-top:50px">
    <h2>Discover Movies</h2>

    <div class="row">
        <?php
            foreach($results as $k=>$v){

//                foreach($v as $key => $value){
//
//                }
                $posterPath = $v->poster_path;
                $title = $v->title;
                $overview = $v->overview;

                $posterPathUrl = $baseImageUrl.$posterPath;

                echo '<div class="col-md-3">';
                echo '<div class="thumbnail">';
                echo '<a href="'. $posterPathUrl .'" >';
                echo '<img src= "'.$posterPathUrl.'"   alt="'.$title.'" style="width:100%">';
                echo '<div class="caption">';
                echo '<p> '.$title.' </p>';
                echo '</div>';
                echo '</a> </div> </div> ';

            }
        ?>
    </div> <!-- end div row-->

</div> <!-- end div container-->


</body>
</html>
