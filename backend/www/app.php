<?php

ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);

session_start();

require 'vendor/autoload.php';
$api = new SpotifyWebAPI\SpotifyWebAPI();






// Fetch the saved access token from somewhere. A database for example.
$accessToken = $_SESSION["token"];
$refreshToken = $_SESSION["refreshtoken"];
$api->setAccessToken($accessToken);


/**
 * Search an artist from a word 
 */
function searchArtist($word, $api) {
    $results = $api->search($word, 'artist');
    foreach ($results->artists->items as $artist) {
        echo "<artist><name>",$artist->name,'</name><id>', $artist->id, '</id></artist>';

    }

}

/**
 * 
 */
function searchTracks($word, $api) {
    
    $results = $api->search($word, 'track');

    $res = json_decode(json_encode($results, true), true);

    $array = array();
    foreach ($res['tracks']['items'] as $track) {
        $array[] = array('id'=>$track['id'],
                         'name'=>$track['name'],
                         'image'=>$track['album']['images'][0]['url'],
                        
                        );
    }

    var_dump($array);

    $json_data = json_encode($array);

}


function searchAlbum($word, $api) {
    $results = $api->search($word, 'album');

 

    foreach ($results->albums->items as $album) {
        echo "<artist><name>",$album->name,'</name><id>', $album->id, '</id></artist>';

    }
}



function getTracksFromAlbum($id, $api) {
    $tracks = $api->getAlbumTracks($id);

    foreach ($tracks->items as $track) {
        echo '<b>' . $track->name .'    '. $track->id .'</b> <br>';
    }
}



function getUserPlaylists($api) {

    $me = $api->me();

    $user = $me->id;

    $playlists = $api->getUserPlaylists($user, [
        'limit' => 5
    ]);
    
    foreach ($playlists->items as $playlist) {
        echo '<a href="' . $playlist->external_urls->spotify . '">' . $playlist->name . '</a>'. $playlist->id.' <br>';
    }

}


function createUserPlaylists($api, $name) {

    $api->createPlaylist([
        'name' => $name
    ]);

}

function addPlaylistTracks($api, $playlist_ID, $track_ID) {

    $api->addPlaylistTracks($playlist_ID, [
        $track_ID,
    ]);

}

function removePlaylistTracks($api, $playlist_ID, $track_ID) {
    
    $api->deletePlaylistTracks($playlist_ID, $track_ID, 'SNAPSHOT_ID');

}



searchTracks("imagine dragon",$api);
//searchAlbum("imagine dragon",$api);
//getTracksFromAlbum("33pt9HBdGlAbRGBHQgsZsU",$api);

//getUserPlaylists($api);

//removePlaylistTracks($api, "21BhPisHKzyJbOumqwxoNS","31VOknKjFrEX47bZXzqcoF")



?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <h1>Test player</h1>

  <script src="https://sdk.scdn.co/spotify-player.js"></script>
  <script>
    window.onSpotifyWebPlaybackSDKReady = () => {
      const token = "<?php echo $accessToken;?>";
      const player = new Spotify.Player({
        name: 'Musicly',
        getOAuthToken: cb => { cb(token); }
      });

      // Error handling
      player.addListener('initialization_error', ({ message }) => { console.error(message); });
      player.addListener('authentication_error', ({ message }) => { console.error(message); });
      player.addListener('account_error', ({ message }) => { console.error(message); });
      player.addListener('playback_error', ({ message }) => { console.error(message); });

      // Playback status updates
      player.addListener('player_state_changed', state => { console.log(state); });

      // Ready
      player.addListener('ready', ({ device_id }) => {
        console.log('Ready with Device ID', device_id);
      });

      // Not Ready
      player.addListener('not_ready', ({ device_id }) => {
        console.log('Device ID has gone offline', device_id);
      });

      // Connect to the player!
      player.connect();

   
    };
  </script>
</body>
</html>