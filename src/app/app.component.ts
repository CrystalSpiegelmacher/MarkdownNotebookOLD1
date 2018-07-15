import { Component, OnInit } from '@angular/core';

import { DataService } from "./data.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {

  constructor(public dataService: DataService) { }
  
  $APP:any = this.dataService.$STATE.app;
  $READER:any = this.dataService.$STATE.reader;


  ngOnInit() {
    this.$APP.debug = this.dataService.getQSValue("debug");
  }


  //========================================================================================================  CONSOLE.LOG $STATE
  consoleLogState(){
    console.log(this.dataService.$STATE);
  }




}
