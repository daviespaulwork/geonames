<?php

	ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    
    $query = $_GET["q"];
    $url = "http://api.geonames.org/postalCodeSearchJSON?postalcode=".$query."&username=daviespaulwork";

    $handle = curl_init();

    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HEADER, 0);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true); 

    $result = curl_exec($handle);

    curl_close($handle);

    echo $result;