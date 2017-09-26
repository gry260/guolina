import {Component, Input, Output, Directive, EventEmitter, HostBinding} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {Http, Response} from '@angular/http';
import {Injectable, ViewChild} from '@angular/core';
import 'rxjs/add/operator/map';
import {ExpenseService} from "../services/expense";
import {SubCategoryComponent} from "app/ExpenseType/SubCategory";

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
  UserCategoryArray: any;


  constructor(e: ExpenseService, s: SubCategoryComponent, h: Http) {
    this.s = s;
    this.e = e;
    this.http = h;
    if (this.isJson(this.categories)) {
      CategoryComponent.listCategories = JSON.parse(this.categories);
      this.SubCategoryObj = new SubCategoryComponent(this.e, this.http);
    }

  }
  ngOnInit() {
    if (this.isJson(this.usercategories)) {
      this.UserCategoryArray= JSON.parse(this.usercategories);
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
    this.http.get('app/ExpenseType/ControllerActions.php?deleteusercategoryid=' + id).map((res: Response) => res.text()).subscribe(data => {
    }, error => {
    });
    for (var key in this.UserCategoryArray) {
      if (this.UserCategoryArray[key].id == id) {
        this.UserCategoryArray.splice(key, 1);
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
    this.http.get('app/ExpenseType/ControllerActions.php?a=addcategorytype&user_id=3&name=' + value.name).map((res: Response) => res.text()).subscribe(data => {
      this.SubCategoryObj.addCategory(data.trim(), value.name);
      this.UserCategoryArray.push({id: data.trim(), name: value.name});
    }, error => {
    });
  }

}