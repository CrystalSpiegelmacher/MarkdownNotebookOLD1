import { Component, OnInit } from '@angular/core';

import { DataService } from "../data.service";

@Component({
  selector: 'app-reader',
  templateUrl: './reader.component.html',
  styleUrls: ['./reader.component.css']
})


export class ReaderComponent implements OnInit {

  $READER:any = this.dataService.$STATE.reader;

  constructor(private dataService: DataService){}

  ngOnInit(){
    this.getFolders();
  }


  //========================================================================= GET FOLDERS
  getFolders(){
    this.dataService.getFolders().subscribe(
      (data: any) => {
        this.$READER.folders = data;
      }
    );
  }




}
