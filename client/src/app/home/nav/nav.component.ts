import { Component, OnInit } from '@angular/core';
import { stdout } from 'process';
import { TranslationService } from 'src/app/services/translation.service';

@Component({
  selector: 'home-nav',
  templateUrl: './nav.component.html',
  styleUrls: ['./nav.component.scss']
})
export class NavComponent implements OnInit {

  constructor(public translate: TranslationService) { }

  ngOnInit(): void {
  }

}
