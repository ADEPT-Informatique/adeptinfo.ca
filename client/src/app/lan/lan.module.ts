import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LanComponent } from './lan.component';
import { LanRoutingModule } from './lan-routing.module';



@NgModule({
  declarations: [LanComponent],
  imports: [
    CommonModule,
    LanRoutingModule
  ]
})
export class LanModule { }
