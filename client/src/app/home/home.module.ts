import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainComponent } from './main/main.component';
import { NavComponent } from './nav/nav.component';
import { MdcComponent } from './mdc/mdc.component';
import { BrowserModule } from '@angular/platform-browser';
import { HomeComponent } from './home/home.component';
import { HomeRoutingModule } from './home-routing.module';
import { Page404homeComponent } from './page404home/page404home.component';
import { FooterComponent } from './footer/footer.component';
import { SharedModule } from '../shared/shared.module';



@NgModule({
  declarations: [
    MainComponent,
    NavComponent,
    MdcComponent,
    HomeComponent,
    Page404homeComponent,
    FooterComponent],
  imports: [
    CommonModule,
    HomeRoutingModule,
    SharedModule
  ]
})
export class HomeModule { }
