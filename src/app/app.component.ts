import { Component } from '@angular/core';
import { DataService } from "./data.service";

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  constructor(public dataService: DataService) { }
  
    $APP:any = this.dataService.$STATE.app;
    $READER:any = this.dataService.$STATE.reader;
  
    //========================================================================= TOGGLE EDIT MODE
    toggleEditMode(){
      this.$READER.editMode = !this.$READER.editMode;
    }
    
    //========================================================================= SAVE
    save(){
      this.dataService.saveMarkdown(this.$READER.currFile.id, this.$READER.currFile.MD, this.$READER.currFile.extra.title).subscribe();
      this.toggleEditMode();
      
      //this.$READER.listFileClick(this.$READER.currFile.id, this.$READER.currFile.index);
    }


}
