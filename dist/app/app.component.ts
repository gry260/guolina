import {Component} from '@angular/core';
import {LoginComponent} from "./Users/Login.components";

@Component({
  selector: 'container',
  templateUrl:'./app.php'
})
export class AppComponent  {
  constructor()
  {
    if(localStorage.getItem('login') !== null && this.isJson(localStorage.getItem('login'))){
      LoginComponent.UserID = JSON.parse(localStorage.getItem('login')).id;
    }
  }

  isJson(str) {
    try {
      JSON.parse(str);
    } catch (e) {
      return false;
    }
    return true;
  }
}
