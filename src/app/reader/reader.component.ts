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
    this.getFiles();
  }


  //========================================================================= GET FOLDERS
  getFolders(){
    this.dataService.getFolders().subscribe(
      (data: any) => {
        this.$READER.folders = data;
      }
    );
  }


  //========================================================================= GET FILES
  getFiles(){
    this.dataService.getFiles().subscribe(
      (data: any) => {
        this.$READER.files = data;
        this.listFileClick(1, 0);
      }
    );
  }

  //========================================================================= LIST FOLDER CLICK
  listFolderClick(id, index){
    console.log("You clicked a FOLDER with the id of " + id);
  }

  //========================================================================= LIST FILE CLICK
  listFileClick(id, index){

    this.$READER.currFile.id = id;
    this.$READER.currFile.index = index;
    this.$READER.currFile.extra = this.$READER.files[index];

    this.dataService.getFileHTML(id).subscribe(
      (data: any) => {
        this.$READER.currFile.HTML = data;
      }
    );
    this.dataService.getFileMD(id).subscribe(
      (data: any) => {
        this.$READER.currFile.MD = data;
      }
    );
  }

      
}
