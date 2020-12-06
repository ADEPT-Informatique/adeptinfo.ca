import { Component, OnInit } from '@angular/core';
import { TranslationService } from 'src/app/services/translation.service';

@Component({
  selector: 'app-mdc',
  templateUrl: './mdc.component.html',
  styleUrls: ['./mdc.component.scss']
})
export class MdcComponent implements OnInit {

  error = "";

  constructor(public translate: TranslationService) { }

  ngOnInit(): void {
  }

}
