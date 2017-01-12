<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
// Initialize the Facebook PHP SDK v5.
$fb = new Facebook\Facebook([
    'app_id'                => '1836003869992015',
    'app_secret'            => '9b4a3fb96f7690f65ea298d9018ea9a7',
    'default_graph_version' => 'v2.8',
]);
?>