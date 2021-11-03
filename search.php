<?php
    $q = $_GET["q"];

    $mysqli = new mysqli("localhost","root","","demo_nasa");
    $query = "SELECT title FROM news";
    $result = $mysqli -> query($query);

    $headlines = mysqli_fetch_all($result);

    $n = 0;
    $suggestions = [];

    foreach ($headlines as $title) {
        if (strpos($title[0], $q) !== false) {
            array_push($suggestions, $title[0]);
            $n++;
        }

        if ($n === 5)
            break;
    }

    if (sizeof($suggestions) > 0) {
        echo json_encode($suggestions);
    } 
    else {
        echo null; 
    }
?>