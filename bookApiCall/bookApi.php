<form name="myForm" method="GET" action="bookApi.php">
    Search for ISBN: <input type="text" name="isbn" pattern="(?:(?=.{17}$)97[89][ -](?:[0-9]+[ -]){2}[0-9]+[ -][0-9]|97[89][0-9]{10}|(?=.{13}$)(?:[0-9]+[ -]){2}[0-9]+[ -][0-9Xx]|[0-9]{9}[0-9Xx])">

    <input type="submit"/>
</form>

<?php

$isbn = $_GET['isbn'];

if ($isbn == null) {
    echo "Please enter ISBN number to search.";
} else {

    $ch = curl_init();

    $url = "https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn;

    print_r('URL: '.$url);

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

    echo '<br/>';
    $volumeInfo = $json_output->items[0]->volumeInfo;
    $saleInfo = $json_output->items[0]->saleInfo;
    $accessInfo = $json_output->items[0]->accessInfo;
    $searchInfo = $json_output->items[0]->searchInfo;

    echo '<br/>';
    echo '<b> Volume Information </b>';
    echo '<br/>';

    foreach($volumeInfo as $k=>$v){
        print_r(strtoupper($k));
        print_r(' : ');
        print_r($v);
        echo '<br/>';
    }

    echo '<br/>';
    echo '<b> Sale Information </b>';
    echo '<br/>';

    foreach($saleInfo as $k=>$v){
        print_r(strtoupper($k));
        print_r(' : ');
        print_r($v);
        echo '<br/>';
    }

    echo '<br/>';
    echo '<b> Access Information </b>';
    echo '<br/>';

    foreach($accessInfo as $k=>$v){
        print_r(strtoupper($k));
        print_r(' : ');
        print_r($v);
        echo '<br/>';
    }

    echo '<br/>';
    echo '<b> Search Information </b>';
    echo '<br/>';

    foreach($searchInfo as $k=>$v){
        print_r(strtoupper($k));
        print_r(' : ');
        print_r($v);
        echo '<br/>';
    }

    } // end of else

?>