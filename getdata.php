<?php require_once __DIR__ . '/vendor/autoload.php'; ?> 

<?php

// ID of Facebook page to gather data from
$page_id = '604497632948882';

// App ID, Client Secret, Version of FB API, and Access token, to access the app
$app_id = '189331864907753';
$app_secret = '26535f5d34a00a18958cef2a635e6bd6';
$default_graph_version = 'v2.8';
$access_token = '189331864907753|UJ0Qj5fLLBn-Ysq-whXCWkGWtW0';

// Tells SDK what info to use
$fb = new Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => $default_graph_version,
]);

// Sets access token
$fb->setDefaultAccessToken($access_token);

// Fields to gather data from
$fields = 'name,about,events';

// Get data from API
try {
  $response = $fb->get('/' . $page_id . '?fields=' . $fields);
  $userNode = $response->getGraphUser();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

// Return data
echo $userNode;

?>
