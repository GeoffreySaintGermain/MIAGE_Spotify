import {RouterModule, Routes } from '@angular/router';
import { ListealbumComponent } from './listealbum/listealbum.component';
import { AccueilComponent } from './accueil/accueil.component';

export const appRoutes: Routes = [
    { path: '', component: AccueilComponent },
    { path: 'accueil', component: AccueilComponent },
    { path: 'listealbum', component : ListealbumComponent},
    ]
