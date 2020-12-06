import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { LanModule } from './lan/lan.module';
import { HomeModule } from './home/home.module';
import { AdminModule } from './admin/admin.module';
import { UtilsModule } from './utils/utils.module';
import { AdeptServiceService } from './services/adept-service.service';
import { TranslationService } from './services/translation.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
    UtilsModule,
    LanModule,
    HomeModule,
    AdminModule

  ],
  providers: [AdeptServiceService,TranslationService],
  bootstrap: [AppComponent]
})
export class AppModule { }
