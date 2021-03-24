import { Component, OnInit } from '@angular/core';
import {TranslateService} from '@ngx-translate/core';
@Component({
  selector: 'app-mdc',
  templateUrl: './mdc.component.html',
  styleUrls: ['./mdc.component.scss']
})
export class MdcComponent implements OnInit {

  error = "";

  constructor() { }

  ngOnInit(): void {
  }

}
