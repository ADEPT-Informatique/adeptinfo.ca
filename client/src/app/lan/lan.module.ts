import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanComponent } from './lan.component';
import { HomeComponent } from './home/home.component';



@NgModule({
  declarations: [LanComponent, HomeComponent],
  imports: [
    CommonModule
  ]
})
export class LanModule { }
