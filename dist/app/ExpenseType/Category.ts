import {Component, Input, Output, Directive, EventEmitter, HostBinding} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {Http, Response} from '@angular/http';
import {Injectable, ViewChild} from '@angular/core';
import 'rxjs/add/operator/map';
import {ExpenseService} from "../services/expense";
import {SubCategoryComponent} from "app/ExpenseType/SubCategory";
import {LoginComponent} from "app/Users/Login.components";

@Component({
  selector: 'crudcategory',
  templateUrl: 'app/ExpenseType/CategoryTemplate.php'
})

export class CategoryComponent {
  @Input() categories;
  @Input() usercategories;
  @Output() delete = new EventEmitter();

  e: ExpenseService;
  s: SubCategoryComponent;
  CategoryTypeForm;
  http: Http;
  static listCategories: any;
  SubCategoryObj: any;
  UserCategoryArray: Array;
  justAdded: any;
  justDeleted: any;
  query: string;



  constructor(e: ExpenseService, s: SubCategoryComponent, h: Http) {
    this.s = s;
    this.e = e;
    this.http = h;
    this.justAdded = false;
    this.justDeleted = false;
    this.query = '';
  }
  ngOnInit() {
    if(this.isJson(this.usercategories)) {
      this.UserCategoryArray= JSON.parse(this.usercategories);
    }
    if(this.UserCategoryArray == null){
      this.UserCategoryArray = new Array();
    }

    if (this.isJson(this.categories)) {
      CategoryComponent.listCategories = JSON.parse(this.categories);
      this.SubCategoryObj = new SubCategoryComponent(this.e, this.http);
    }
    this.CategoryTypeForm = new FormGroup({
      name: new FormControl(''),
    });
  }

  onDel(id) {
    if(LoginComponent.getUserID()) {
      var Observables = this.e.DeleteCategory(id);
      Observables.subscribe((res => {
        this.justDeleted = true;
        this.justAdded = false;
      }));
      for (var key in this.UserCategoryArray) {
        if (this.UserCategoryArray[key].id == id) {
          this.UserCategoryArray.splice(key, 1);
        }
      }
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

  static get() {
    return CategoryComponent.listCategories;
  }

  onSubmit(value) {
    if(LoginComponent.getUserID()) {
      var Observables = this.e.AddCategory(LoginComponent.getUserID(), value.name);
      Observables.subscribe((res => {
        this.SubCategoryObj.addCategory(res.text().trim(), value.name);
        this.UserCategoryArray.push({id: res.text().trim(), name: value.name});
        this.justAdded = true;
        this.justDeleted = false;
        this.query = '';
      }));
    }
  }

}