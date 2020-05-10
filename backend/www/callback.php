<?php
session_start();

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '9c891ff039e3416380511917b19d1fea',
    'bc3c1daa872f4778bf8b369bd44d1854',
    'http://localhost/callback.php'
);

// Request a access token using the code from Spotify
$session->requestAccessToken($_GET['code']);
$accessToken = $session->getAccessToken();
$refreshToken = $session->getRefreshToken();

// Store the access and refresh tokens somewhere. In a database for example.
$_SESSION["token"]=$accessToken;
$_SESSION["refreshtoken"]=$refreshToken;



// Send the user along and fetch some data!
header('Location: app.php');
//die();
?>