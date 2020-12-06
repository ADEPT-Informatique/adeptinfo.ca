import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { MainComponent } from './main/main.component';
import { MdcComponent } from './mdc/mdc.component';
import { Page404homeComponent } from './page404home/page404home.component';

const routes: Routes = [
  {
    path: 'home', component: MainComponent, children: [
      { path: 'home', component: HomeComponent },
      { path: 'mdc', component: MdcComponent }, 
      { path: 'membredeconfiance', component: MdcComponent }, 
      {
        path: '', redirectTo: 'home', pathMatch: 'full'
      },
      { path: '**', component: Page404homeComponent }
    ]
  },
  { path: '', redirectTo: 'home', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class HomeRoutingModule { }
