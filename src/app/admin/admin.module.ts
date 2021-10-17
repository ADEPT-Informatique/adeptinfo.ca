import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AdminComponent } from './admin.component';
import { AdminRoutingModule } from './admin-routing.module';
import { AdminNotFoundComponent } from './pages/admin-not-found/admin-not-found.component';
import { SharedModule } from '../shared/shared.module';
import { HomeComponent } from './pages/home/home.component';
import { ShoppingComponent } from './pages/shopping/shopping.component';
import { UsersComponent } from './pages/users/users.component';
import { HoodiesComponent } from './pages/hoodies/hoodies.component';
import { MdcComponent } from './pages/mdc/mdc.component';
import { SidebarComponent } from './components/sidebar/sidebar.component';

@NgModule({
  declarations: [
    AdminComponent,
    AdminNotFoundComponent,
    HomeComponent,
    ShoppingComponent,
    UsersComponent,
    HoodiesComponent,
    MdcComponent,
    SidebarComponent,
  ],
  imports: [CommonModule, AdminRoutingModule, SharedModule],
})
export class AdminModule {}
