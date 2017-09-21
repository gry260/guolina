import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule}   from '@angular/forms';  // <-- NgModel lives here
import {AppComponent} from './app.component';

import {RegisterComponent} from './Users/Register.component';


@NgModule({
  imports: [
    BrowserModule,
    FormsModule  // <-- import the FormsModule before binding with [(ngModel)]
  ],
  declarations: [AppComponent, RegisterComponent],
  bootstrap: [AppComponent, RegisterComponent]
})
export class AppModule {}
