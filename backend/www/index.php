

<?php

/*
    $spotifyToken =  "https://accounts.spotify.com/authorize";
    $spotifyUrlSearchAlbum = "https://api.spotify.com/v1/search?type=album&market=FR&limit=10&q=";
    $spotifyUrlAlbum = 'https://api.spotify.com/v1/albums/';

    $spotifyUrlSearchSinger = "https://api.spotify.com/v1/search?type=artist&market=FR&limit=10&q=";   
    $headers = "";
  
    $spotifyPlaylist = 'https://api.spotify.com/v1/users/';
    $spotifyPlaylistTracks = 'https://api.spotify.com/v1/playlists/';
    $userId = 'yaybrgd7ytwu7ipr7gni672n5';
  

  function getTokenSpotify (){

    $parameters = array( 
        "response_type"=>"code",
        "client_id"           => "9c891ff039e3416380511917b19d1fea",
        "scope"       =>"user-read-private user-read-email",
        "redirect_uri"  => "http://localhost:4200/accueil",
        "state"=>"state"
    );

    echo $request="https://accounts.spotify.com/authorize?".http_build_query($parameters);

     // initialisation de la session
     $ch = curl_init();


     // configuration des options
     curl_setopt($ch, CURLOPT_URL, $request);
     curl_setopt($ch, CURLOPT_HEADER, 1);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);     // exécution de la session
     $exec = curl_exec($ch);
 
     if(curl_errno($ch)){
         echo 'Curl error: ' . curl_error($ch);
     }else{
         echo curl_getinfo($ch,CURLINFO_REDIRECT_URL);

     }
 
     // fermeture des ressources
     curl_close($ch);
  

  }

   
    function getAlbum($mot,$token,$userId) {

                                                        
        $parameters = array( 
            "key"         => $key,
            "q"           => $Query,
            "start"       => $start,
            "maxResults"  => 10,
            "filter"      => true,
            "restrict"    => "",
            "safeSearch"  => false,
            "lr"          => "lang_en", 
            "ie"          => "",
            "oe"          => ""
        );

        $soapclient = new soapclient("http://api.google.com/search/beta2");
        $result = $soapclient->call("doGoogleSearch", $parameters, "urn:GoogleSearch");
        
    }

    
    getTokenSpotify();*/
?>
