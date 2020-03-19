<?php
session_start();

require_once('Facebook/autoload.php');

$fb = new Facebook\Facebook([
'app_id' => '1084912735029210',
'app_secret' => '32a751f2622ed529824706bbe07c5757',
'default_graph_version' => 'v2.9',
]);
?>