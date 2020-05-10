import { Injectable } from '@angular/core';
import {HttpHeaders} from '@angular/common/http';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class SpotifyService {

  private spotifyUrlSearchAlbum = "https://api.spotify.com/v1/search?type=album&market=FR&limit=10&q=";
  private spotifyUrlAlbum = 'https://api.spotify.com/v1/albums/';
  

  private spotifyUrlSearchChanteur = "https://api.spotify.com/v1/search?type=artist&market=FR&limit=10&q=";
  private token = 'BQDMcvSXTJVNop9RV8LGsXuqiFNTG_rKc_6kwahV7Y8kjWHdiTLjxufrKxCmEHvN6_4GiVTVQk3pOxAxY0OfbE64h-ShyT9ky1qqlaBhMmpbh2ePUen91B3scrHpWYPfPgyx5JtfeA6iPk32pBuKM3DY9EQ3LVFPIWAH0mbzYRTYSM7l119TY99bX4yf7xYDfszkYlaA14wLa_44fI7NkcxA-iJwXo9yz0SvmQyIrRCiYVpcwWDoyGPEgHSeZStGEytCMzXXAjqkOvyT2bJcOI7X9DId7OiOXDNR';
  private headers : HttpHeaders;

  private spotifyPlaylist = 'https://api.spotify.com/v1/users/';
  private spotifyPlaylistTracks = 'https://api.spotify.com/v1/playlists/';
  private userId = 'vg3vlm9q2jszaijtr52x5ww5o';

  constructor(private http:HttpClient) { 
    this.headers = new HttpHeaders(
      {'Content-Type': 'application/json',  
       'Authorization' : 'Bearer '+ this.token }
      );
  }

  getAlbums(mot:string) {
    return this.http.get(
      this.spotifyUrlSearchAlbum+mot
      ,{ headers : this.headers}
      );
  }

  getChanteur(mot:string){
    return this.http.get(
      this.spotifyUrlSearchChanteur+mot
      ,{ headers : this.headers}
      );
  }

  getAlbumId(id : string){
    return this.http.get(
      this.spotifyUrlAlbum+id 
      ,{ headers : this.headers}
      );
  }

  getPlaylist(){
    return this.http.get(
      this.spotifyPlaylist + this.userId + '/playlists'
      ,{headers : this.headers}
      );
  }

  getPlaylistTracks(id : string){
    return this.http.get(
      this.spotifyPlaylistTracks + id + "/tracks" 
      ,{headers : this.headers} 
      );
  }

  //Enlever une chanson d'une playlist
  removePlaylistTrack(idPlaylist:string, position : number, uri : string){
    return this.http.request(
      "delete",
      this.spotifyPlaylistTracks + idPlaylist + '/tracks', { 
        "body" : 
        { "tracks" : 
          [{
            uri: uri , 
            positions: [position], 
          }]
        },
        "headers" : this.headers
      }
    );
  }

  afficherLog(){
    console.log("spotify service :"  + this.spotifyPlaylistTracks + "/tracks"
       + "headers : " + this.headers);
  }

  //Créer une playlist
  addPlaylist(playlist){
    this.http.post(this.spotifyPlaylist 
                    + this.userId 
                    + "/playlists",playlist,{ headers : this.headers})
      .subscribe(
        (res)=>{
            window.location!.reload()
            console.log(res)
          },
        (err) => console.log(err)
      );
  }

  //Ajouter une chanson à une playlist
  addToPlaylist(track, idPlaylist){
    this.http.post(this.spotifyPlaylistTracks
                  + idPlaylist
                  + "/tracks",track,{ headers : this.headers})
      .subscribe(resultat=>{
       (res) => console.log(res);
        (err) => console.log(err);
      })
  }
}
