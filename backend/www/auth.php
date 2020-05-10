<?php
session_start();

require 'vendor/autoload.php';


$session = new SpotifyWebAPI\Session(
    '9c891ff039e3416380511917b19d1fea',
    'bc3c1daa872f4778bf8b369bd44d1854',
    'http://localhost/callback.php'
);


if(isset($_SESSION["token"]) && isset($_SESSION["refreshtoken"])){
    
    $accessToken = $_SESSION["token"];
    $refreshToken = $_SESSION["refreshtoken"];

    // Use previously requested tokens fetched from somewhere. A database for example.
    if ($accessToken) {
        $session->setAccessToken($accessToken);
        $session->setRefreshToken($refreshToken);
    } else {
        // Or request a new access token
        $session->refreshAccessToken($refreshToken);
    }

}

$options = [
    'auto_refresh' => true,
];

$api = new SpotifyWebAPI\SpotifyWebAPI($options, $session);

// You can also call setSession on an existing SpotifyWebAPI instance
$api->setSession($session);


if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    $api->setAccessToken($session->getAccessToken());

    print_r($api->me());
} else {
    $options = [
        'scope' => [
            'ugc-image-upload
            user-read-playback-state
            user-modify-playback-state
            user-read-currently-playing
            app-remote-control
            user-read-email
            user-read-private
            playlist-read-collaborative
            playlist-modify-public
            playlist-read-private
            playlist-modify-private
            user-library-modify
            user-library-read
            user-top-read
            user-read-playback-position
            user-read-recently-played
            user-follow-read
            user-follow-modify
            streaming',
        ],
    ];

    header('Location: ' . $session->getAuthorizeUrl($options));
    die();
}
?>

