<?php
//require_once 'google-api-php-client/autoload.php';
require_once 'google-api-php-client/src/Google/autoload.php';


session_start();

$client = new Google_Client();
$client->setAuthConfigFile('client_secret_key.json');
//$client->addScope("https://www.googleapis.com/auth/userinfo.email");
$client->addScope(array("https://www.googleapis.com/auth/userinfo.email",
    "https://www.googleapis.com/auth/userinfo.profile"
));
//$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/jc/googleOauth/index.php');
$client->setRedirectUri('https://lawsyst.com/core-features/');

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
    $client->authenticate($_GET['code']);
    $_SESSION['access_token'] = $client->getAccessToken();
    var_dump($_SESSION['access_token']);
    $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}