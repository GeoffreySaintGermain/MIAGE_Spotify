import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HttpClientModule } from '@angular/common/http';
import { SpotifyService } from './spotify.service';
import { ListealbumComponent } from './listealbum/listealbum.component';


import { FormsModule } from '@angular/forms'; // <== add the imports!
import { MatListModule } from '@angular/material';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatCardModule} from '@angular/material/card';
import {MatInputModule} from '@angular/material/input';
import {MatIconModule} from '@angular/material/icon';
import {MatGridListModule } from '@angular/material/';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AccueilComponent } from './accueil/accueil.component';
import { MatSidenavModule } from '@angular/material/sidenav' ;
import { MatToolbarModule } from '@angular/material/toolbar';
import { RouterModule } from '@angular/router';
import { appRoutes } from './app.routing';


@NgModule({
  declarations: [
    AppComponent,
    ListealbumComponent,
    AccueilComponent,
    
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    MatCardModule,
    MatInputModule,
    MatIconModule,
    FormsModule,
    MatFormFieldModule,
    MatListModule,
    MatGridListModule,
    BrowserAnimationsModule,
    MatSidenavModule,
    MatToolbarModule,
    RouterModule.forRoot(appRoutes)
  ],
  providers: [SpotifyService],
  bootstrap: [AppComponent]
})
export class AppModule { }
