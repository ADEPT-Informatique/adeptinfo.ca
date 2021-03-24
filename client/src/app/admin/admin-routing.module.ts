import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AdminNotFoundComponent } from './pages/admin-not-found/admin-not-found.component';
import { AdminComponent } from './admin.component';
import { HomeComponent } from './pages/home/home.component';
import { ShoppingComponent } from './pages/shopping/shopping.component';
import { UsersComponent } from './pages/users/users.component';
import { HoodiesComponent } from './pages/hoodies/hoodies.component';
import { MdcComponent } from './pages/mdc/mdc.component';

const routes: Routes = [
  {
    path: '', component: AdminComponent,
    children: [
      {
        path: '',
        component: HomeComponent
      },
      {
        path: 'fridge',
        component: ShoppingComponent
      },
      {
        path: 'users',
        component: UsersComponent
      },
      {
        path: 'hoodies',
        component: HoodiesComponent
      },
      {
        path: 'mdc',
        component: MdcComponent
      },
      {
        path: '**',
        component: AdminNotFoundComponent
      },
    ]
  },
  { path: '**', redirectTo: '', pathMatch: 'full' }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminRoutingModule { }
