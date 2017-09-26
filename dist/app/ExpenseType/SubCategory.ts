import {Component, Input, Directive,} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {Http, Response} from '@angular/http';
import {Injectable} from '@angular/core';
import 'rxjs/add/operator/map';
import {ExpenseService} from "../services/expense";
import {CategoryComponent} from "app/ExpenseType/Category";

@Component({
  selector: 'crudSubcategory',
  templateUrl: 'app/ExpenseType/SubCategoryTemplate.php'
})

export class SubCategoryComponent {
  categorySubTypeForm: FormGroup;
  expenseServices: ExpenseService;
  listCategories: any;
  http: Http;

  @Input() userSubCategories;
  UserSubCategoryDbArray = new Array();

  constructor(e: ExpenseService, h: Http) {
    this.expenseServices = e;
    this.listCategories = CategoryComponent.get();
    this.http = h;
  }

  ngOnInit() {
    if (this.isJson(this.userSubCategories)) {
      this.userSubCategories = JSON.parse(this.userSubCategories);
      for (var k in this.userSubCategories) {
        var temp = [];
        for (var j in this.userSubCategories[k]) {
          temp.push({
            id: this.userSubCategories[k][j].id, subcategory_name: this.userSubCategories[k][j].name,
            category_id: this.userSubCategories[k][j].category_id
          });
        }
        this.UserSubCategoryDbArray.push({name: k, id: this.userSubCategories[k][0].category_id, data: temp});
      }
    }
    this.listCategories = CategoryComponent.get();
    this.categorySubTypeForm = new FormGroup({
      category_obj: new FormControl(''),
      name: new FormControl('poke'),
    });
  }

  onDel(id) {
    this.http.get('app/ExpenseType/ControllerActions.php?deleteusersubcategoryid=' + id).map((res: Response) => res.text()).subscribe(data => {
      for (var k in this.UserSubCategoryDbArray) {
        for (var j in this.UserSubCategoryDbArray[k].data) {
          if (this.UserSubCategoryDbArray[k].data[j].id == id) {
            this.UserSubCategoryDbArray[k].data.splice(j, 1);
          }
        }
      }
    }, error => {
    });
  }

  onSubmit(value, v) {
    this.expenseServices.addExpenseSubCategoryType({
      name: value.name,
      category_id: value.category_obj.id,
      type: value.category_obj.t,
    }).subscribe(data => {
      var find = false;
      for (var k in this.UserSubCategoryDbArray) {
        if (value.category_obj.id == this.UserSubCategoryDbArray[k].id) {
           this.UserSubCategoryDbArray[k].data.push({id: data.trim(), subcategory_name: value.name, category_id: value.category_obj.id});
           find = true;
        }
      }
      if(find == false){
        this.UserSubCategoryDbArray.push({id: value.category_obj.id, name: value.category_obj.name, data:[{
          id: data.trim(),
          subcategory_name: value.name,
          category_id: value.category_obj.id
        }]});
      }
    }, error => {
      console.log(error.json());
    });
  }

  addCategory(categoryID, Name) {
    this.listCategories.push({
      id: categoryID,
      name: Name,
      t: "u"
    });
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