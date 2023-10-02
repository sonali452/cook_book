<?php

//start session on web page
//session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$gClient = new Google_Client();

//Set the OAuth 2.0 Client ID
$gClient->setClientId('713376189789-6b1es9veqm9qk2nbcjhv4a0e7gc11mdc.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$gClient->setClientSecret('lb8I36s8FnZ30nom6wk8U3Hs');

//Set the OAuth 2.0 Redirect URI
$gClient->setRedirectUri('http://localhost/cook_book/signupGoogle.php');

// to get the email and profile 
//$gCclient->addScope('email');

//$gCclient->addScope('profile');

$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

$signup_url=$gClient->createAuthUrl();

?>