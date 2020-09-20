<?php

	ini_set('display_errors', 'On');
	error_reporting(E_ALL);

	include('openCage/AbstractGeocoder.php');
    include('openCage/Geocoder.php');
	

    $geocoder = new \OpenCage\Geocoder\Geocoder('53e3194636c84171a1fea32282ae53c4');

    $result = $geocoder->geocode($_REQUEST['q'],['language'=>$_REQUEST['lang']]);
    
    $searchResult = [];
	$searchResult['results'] = [];

	foreach ($result['results'] as $entry) {

		$temp['source'] = 'opencage';
		$temp['formatted'] = $entry['formatted'];
		$temp['geometry']['lat'] = $entry['geometry']['lat'];
		$temp['geometry']['lng'] = $entry['geometry']['lng'];
		$temp['countryCode'] = $entry['components']['country_code'];
		$temp['timezone'] = $entry['annotations']['timezone']['name'];
        
        array_push($searchResult['results'], $temp);

	}
	
	echo json_encode($searchResult);