import {NgModule} from '@angular/core';
import {BrowserModule} from '@angular/platform-browser';
import {FormsModule,  ReactiveFormsModule}   from '@angular/forms';  // <-- NgModel lives here
import { HttpModule } from '@angular/http';
import {AppComponent} from './app.component';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import {NgbModal, NgbActiveModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';

import { CategoryComponent} from "./ExpenseType/Category";
import { SubCategoryComponent} from "./ExpenseType/SubCategory";
import {RegisterComponent} from './Users/Register.component';
import {ExpenseComponent} from './ExpenseType/Expense';
import {UserService} from "./services/user";
import { ExpenseService } from "./services/expense";
import { SearchComponent } from "./Search/Search.compoment";

@NgModule({
  imports: [
    HttpModule,
    BrowserModule,
    FormsModule,  // <-- import the FormsModule before binding with [(ngModel)]
    ReactiveFormsModule,
    NgbModule.forRoot(),
  ],
  declarations: [AppComponent, RegisterComponent, CategoryComponent, SubCategoryComponent,  ExpenseComponent, SearchComponent],
  bootstrap: [AppComponent],
  providers: [ExpenseService, UserService, CategoryComponent, SubCategoryComponent, NgbActiveModal]
})
export class AppModule {}
