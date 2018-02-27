<?php

 $ch = curl_init();

 $movieTitle = $_GET['searchbox'];

 if ($movieTitle == NULL) {
     $url = "https://api.themoviedb.org/3/discover/movie?page=1&include_video=false&include_adult=false&sort_by=popularity.desc&language=en-US&api_key=47096e9f413866406e8887e56411ced5";
 } else {
     $parsedTitle = str_replace(' ', '%20', $movieTitle);
     $url = "https://api.themoviedb.org/3/search/movie?api_key=47096e9f413866406e8887e56411ced5&language=en-US&query=".$parsedTitle."&page=1&include_adult=false";
 }

 $baseImageUrl = "http://image.tmdb.org/t/p/w185/";

     //Set the URL that you want to GET by using the CURLOPT_URL option.
    curl_setopt($ch, CURLOPT_URL, $url);
     //Set CURLOPT_RETURN TRANSFER so that the content is returned as a variable.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     //Set CURLOPT_FOLLOW LOCATION to true to follow redirects.
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

<?php include 'templates/header.html'; ?>

    <h2>Discover Movies</h2>

    <div class="row">
        <?php

            foreach($results as $k=>$v){

//                foreach($v as $key => $value){
//
//                }
                $posterPath = $v->poster_path;

                if ($posterPath != NULL) {
                    $title = $v->title;
                    $overview = $v->overview;

                    $posterPathUrl = $baseImageUrl.$posterPath;

                    echo '<div class="col-md-2">';
                    echo '<div class="thumbnail">';
                    echo '<a href="'. $posterPathUrl .'" >';
                    echo '<img src= "'.$posterPathUrl.'"   alt="'.$title.'" style="width:100%">';
                    echo '</a> </div> </div> ';
                }


            }
        ?>
    </div> <!-- end div row-->

<?php include 'templates/footer.html'; ?>
