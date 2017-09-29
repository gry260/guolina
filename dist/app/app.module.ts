import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule,  ReactiveFormsModule}   from '@angular/forms';  // <-- NgModel lives here
import { HttpModule } from '@angular/http';
import {AppComponent} from './app.component';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {NgbModal, NgbActiveModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import {ChartsModule, Color} from 'ng2-charts';


import { CategoryComponent} from "./ExpenseType/Category";
import { SubCategoryComponent} from "./ExpenseType/SubCategory";
import {RegisterComponent} from './Users/Register.component';
import {ExpenseComponent} from './ExpenseType/Expense';
import {UserService} from "./services/user";
import { ExpenseService } from "./services/expense";
import { SearchComponent } from "./Search/Search.compoment";
import { LoginComponent} from "./Users/Login.components";
import {LogoutComponent} from "./Users/Logout.component";

@NgModule({
  imports: [
    HttpModule,
    BrowserModule,
    FormsModule,  // <-- import the FormsModule before binding with [(ngModel)]
    ReactiveFormsModule,
    NgbModule.forRoot(),
    ChartsModule
  ],
  declarations: [AppComponent, RegisterComponent, CategoryComponent, SubCategoryComponent,
    ExpenseComponent, SearchComponent, LoginComponent, LogoutComponent],
  bootstrap: [AppComponent],
  providers: [ExpenseService, UserService, CategoryComponent, SubCategoryComponent, NgbActiveModal, LoginComponent]
})
export class AppModule {}
