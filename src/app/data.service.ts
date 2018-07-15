import { Injectable } from '@angular/core';

import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class DataService {

///////////////////////////////////////////////////////////////////////////////////////////// STATE

  $STATE:any = {
    "app":{
      "title":"Markdown Notebook", 
      "debug":false, 
    }, 
    "home":{

    }, 
    "reader":{
      "currFile":{}, 
      "editMode":false, 
    }
  }

/////////////////////////////////////////////////////////////////////////////////////////////


  constructor(private http: HttpClient){}


  ///////////////////////////////////////////////////////////////////////////////////////////// ENDPOINTS

  APIURL = 'http://markdownnotebookapi';


  getFolders(){
    return this.http.get(this.APIURL + "/folders");
  }

  getFiles(){
    return this.http.get(this.APIURL + "/files");
  }


  getFileHTML(id){
    return this.http.get(this.APIURL + "/filehtml/" + id, {responseType:"text"});
  }
  getFileMD(id){
    return this.http.get(this.APIURL + "/filemd/" + id, {responseType:"text"});
  }


  saveMarkdown(id, markdown, title){
    return this.http.post(this.APIURL + "/markdownsave/" + id, {"markdown":markdown, "title":title});
  }



  
/////////////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////////////// UTILITY METHODS

  METHOD(){
    console.log("This function is an unassigned function in the dataservice.")
  }


  getQSValue(name){
    var reg = new RegExp( '[?&]' + name + '=([^&#]*)', 'i' );
    var string = reg.exec(window.location.href);
    return string ? string[1] : null;
  };

}
