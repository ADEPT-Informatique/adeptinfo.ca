import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { TranslateModule } from '@ngx-translate/core';
import { AdeptService } from './services/adept.service';
import { FontAwesomeModule } from '@fortawesome/angular-fontawesome';



@NgModule({
  declarations: [

  ],
  imports: [
    CommonModule,
    TranslateModule,
    FontAwesomeModule
  ],
  exports: [
    TranslateModule,
    FontAwesomeModule
  ],
  providers: [AdeptService]
})
export class SharedModule { }
