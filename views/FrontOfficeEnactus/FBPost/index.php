<?php
include('init.php');

$helper = $fb->getRedirectLoginHelper();

$permissions = ['manage_pages','publish_actions','publish_pages'];
$loginUrl = $helper->getLoginUrl('http://localhost/projet-web/projet-web/projet%20web/views/FrontOfficeEnactus/FBPost/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>