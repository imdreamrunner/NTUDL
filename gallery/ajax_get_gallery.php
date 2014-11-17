<?php

define("APP_ID", "467958100008870");
define("APP_SECRET", "0fec9584f1cecbe93a2c52ed4c93595a");

require __DIR__ . '/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRequest;

set_time_limit(0);

FacebookSession::setDefaultApplication(APP_ID, APP_SECRET);

$access_token = APP_ID . "|" . APP_SECRET;
$session = new FacebookSession($access_token);

$request = new FacebookRequest(
    $session,
    'GET',
    '/NTUDL/photos/uploaded?limit=9'
);
$response = $request->execute();
$graphObject = $response->getGraphObject();

/*
if ($graphObject->getProperty('backingData') === null) {
    exit("no backing data");
}
*/

$photos = $graphObject->getProperty('data')->asArray();

$returnList = [];

foreach ($photos as $photo ) {
    array_push($returnList, Array(
        "source" => $photo->source,
        "link" => $photo->link
    ));
}

header('Content-Type: application/json');
echo json_encode($returnList);
