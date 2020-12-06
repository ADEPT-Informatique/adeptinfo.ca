import { Component } from '@angular/core';
import { TranslationService } from './services/translation.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'client';

  
  constructor(public translate: TranslationService) { }

  ngOnInit(): void {
    
    if(!this.translate.get('lang'))
    {
      this.translate.setLanguage('fr');
    }
  }
}
