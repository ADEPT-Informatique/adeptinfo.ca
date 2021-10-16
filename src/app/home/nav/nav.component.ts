import { Component, HostListener } from '@angular/core';
import { Router } from '@angular/router';
import { TranslateService } from '@ngx-translate/core';

@Component({
  selector: 'home-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss'],
})
export class NavComponent {
  scrolled: boolean = false;

  constructor(
    public translationService: TranslateService,
    public router: Router
  ) {}

  toggleLanguage() {
    this.translationService
      .get('toggle')
      .toPromise()
      .then((value) => {
        this.translationService.use(value);
      });
  }

  getCurrentPage() {
    let url = this.router.url;
    return url.includes('#') ? url : url + '#';
  }

  @HostListener("window:scroll", [])
  onScroll() {
    this.scrolled = window.scrollY > 20;
  }
}
