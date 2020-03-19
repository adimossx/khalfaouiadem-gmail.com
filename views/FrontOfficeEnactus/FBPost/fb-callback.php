<?php
include('init.php');

$helper = $fb->getRedirectLoginHelper();
$_SESSION['FBRLH_state']=$_GET['state'];

try {

  $accessToken = $helper->getAccessToken();

} catch(Facebook\Exceptions\FacebookResponseException $e) {

  echo 'Graph returned an error: ' . $e->getMessage();
  exit;

} catch(Facebook\Exceptions\FacebookSDKException $e) {
  
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;

}

if (! isset($accessToken)) {
  echo 'No OAuth data could be obtained from the signed request. User has not authorized your app yet.';
  exit;
}

try {

  $response = $fb->get('me/accounts', $accessToken->getValue());
  $response = $response->getDecodedBody();

} catch(Facebook\Exceptions\FacebookResponseException $e) {
  
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;

} catch(Facebook\Exceptions\FacebookSDKException $e) {
  
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;

}

echo "<pre>";
print_r($response);
echo "</pre>";
?>