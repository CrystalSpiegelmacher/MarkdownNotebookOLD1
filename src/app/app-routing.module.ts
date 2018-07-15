import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent }      from './home/home.component';
import { ReaderComponent }      from './reader/reader.component';

const routes: Routes = [
  { path: '',  redirectTo: '/home',  pathMatch: 'full'},
  { path: 'home', component: HomeComponent }, 
  { path: 'reader', component: ReaderComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }