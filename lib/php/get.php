<?php

 

    // ini_set('display_errors', 'On');

    // error_reporting(E_ALL);

 

    $executionStartTime = microtime(true);

 

    $countryBorders = json_decode(file_get_contents('../countries_large.geo.json'), true);

 

    $border = null;

 

    foreach ($countryBorders['features'] as $feature) {

 

        if ($feature["properties"]["ADMIN"] ==  $_REQUEST['countryCode']) {

 

            $border = $feature;

            break;

        

        }

        

    }

 

    $output['status']['code'] = "200";

    $output['status']['name'] = "ok";

    $output['status']['description'] = "success";

    $output['status']['executedIn'] = intval((microtime(true) - $executionStartTime) * 1000) . " ms";

    $output['data'] = $border;

    

    header('Content-Type: application/json; charset=UTF-8');

 

    echo json_encode($output);

 

?>







