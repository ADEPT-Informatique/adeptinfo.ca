import { ChangeDetectorRef, Component, HostListener, OnInit } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'home-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent {

  constructor(
    public translationService: TranslateService
  ) { }

  toggleLanguage() {
    this.translationService.get("toggle").toPromise().then(
      value => {
        this.translationService.use(value);
      }
    )
  }


}
