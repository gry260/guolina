import {Component, Input, Directive, Pipe, ElementRef, ViewChild, ViewChildren} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {ExpenseService} from "../services/expense";


@Component({
  selector: 'search',
  templateUrl: 'app/Search/Search.php'
})
export class SearchComponent {

  @Input() parameters;
  @ViewChildren('sc3') s: ElementRef;
  SearchForm: any;
  p = new Array();
  p2 = new Array();
  p3 = new Array();
  s: any;
  DoneTypingInterval: number;
  TypingTimer: any;
  NameTypingTimer: any;
  ExpenseServices: ExpenseService;
  Options: any;
  Reports = new Array();

  constructor(e: ExpenseService) {
    this.ExpenseServices = e;
    this.DoneTypingInterval = 2000;
    this.SearchForm = new FormGroup({
      name: new FormControl(),
      poperator1: new FormControl("≈"),
      poperator2: new FormControl("≈"),
      price1: new FormControl(),
      price2: new FormControl(),
    });
  }

  ngOnInit() {
    this.Options = {
      category_ids: [],
      subcategory_ids: [],
      name: '',
      price: [],
      last: '',
      from: '',
      end: '',
    }

    if (this.isJson(this.parameters)) {
      this.p = JSON.parse(this.parameters);
      for (var k in this.p) {
        this.p3[k] = new Array();
        if (this.p[k][0]) {
          for (var l in this.p[k][0].data) {
            var obj = {
              name: this.p[k][0].data[l],
              id: l,
              type: this.p[k][0].type,
            }
            this.p3[k].push(obj);
          }
        }
        if (this.p[k][1]) {
          for (var l in this.p[k][1].data) {
            var obj = {
              name: this.p[k][1].data[l],
              id: l,
              type: this.p[k][1].type,
            }
            this.p3[k].push(obj);
          }
        }
      }
    }
  }

  ngAfterViewInit() {

  }

  OnClickUpdateCategory(category_id, user_category_id, index, ccategory_checkbox) {
    if (this.Options.subcategory_ids.length > 0) {
      for (var k in this.Options.subcategory_ids) {
        if (this.Options.subcategory_ids[k].category_id !== undefined) {
          var temp = this.Options.subcategory_ids;
          if (ccategory_checkbox.checked == false) {
            if (this.Options.subcategory_ids.length > 0) {
              for (var i = this.Options.subcategory_ids.length - 1; i >= 0; i--) {
                if (this.Options.subcategory_ids[i].category_id == category_id) {
                  this.Options.subcategory_ids.splice(i, 1);
                }
              }
            }
          }
        }
      }
    }
    if (ccategory_checkbox.checked == true) {
      if (category_id !== undefined) {
        this.Options.category_ids.push({type: "c", id: category_id});
      }
      if (user_category_id !== undefined) {
        this.Options.category_ids.push({type: "uc", id: user_category_id});
      }
      for (var i = 0; i < this.s._results[index].nativeElement.children.length; i++) {
        this.s._results[index].nativeElement.children[i].childNodes[1].checked = true;
      }
    }
    else if (ccategory_checkbox.checked == false) {
      for (var i = 0; i < this.s._results[index].nativeElement.children.length; i++) {
        this.s._results[index].nativeElement.children[i].childNodes[1].checked = false;
      }

      for (var k in this.Options.category_ids) {
        if (this.Options.category_ids[k].id == category_id && this.Options.category_ids[k].type == "c") {
          this.Options.category_ids.splice(k, 1);
        }
        else if (this.Options.category_ids[k].id == user_category_id && this.Options.category_ids[k].type == "uc") {
          this.Options.category_ids.splice(k, 1);
        }
      }
    }
    this.SearchReport(this.Options);
  }


  OnCLickUpdateSubCategory(category_id, user_category_id, id, type, category_index, subcategory) {
    if (this.s._results[category_index].nativeElement.parentElement.children[0].checked == true) {
      this.s._results[category_index].nativeElement.parentElement.children[0].checked = false;
    }

    for (var k in this.Options.category_ids) {
      if (this.Options.category_ids[k].id == category_id && this.Options.category_ids[k].type == "c") {
        this.Options.category_ids.splice(k, 1);
      }
      else if (this.Options.category_ids[k].id == user_category_id && this.Options.category_ids[k].type == "uc") {
        this.Options.category_ids.splice(k, 1);
      }
    }

    if (subcategory.checked == true) {
      this.Options.subcategory_ids.push({
        id: id,
        type: type,
        category_id: category_id,
        user_category_id: user_category_id,
      });
    }
    else {
      for (var k in this.Options.subcategory_ids) {
        if (this.Options.subcategory_ids[k].id == id) {
          this.Options.subcategory_ids.splice(k, 1);
        }
      }
    }
    this.SearchReport(this.Options);
  }

  SearchReport(options) {
    this.Reports = new Array();
    var Observables = this.ExpenseServices.SearchReports(options);
    Observables.subscribe((res => {
      if(res._body) {
        var temp = res.json();
        for (var k in temp) {
          this.Reports.push({name: k, data: temp[k]});
        }
      }
    }));
  }

  OnClickUpdateName(name) {
    var that = this;
    if (name.length > 2) {
      this.Options.name = name;
    }
    else if (name.length == 0) {
      this.Options.name = '';
    }
    clearTimeout(this.NameTypingTimer);
    this.NameTypingTimer = setTimeout(function (index) {
      return function () {
        that.DoneTyping(index)
      }
    }(this.ExpenseServices), this.DoneTypingInterval);
  }

  OnClickUpdatePrice(operator, price, index) {
    var that = this;
    if (this.isNumeric(price)) {
      this.Options.price[index] = {operator: operator, price: price};
    }
    clearTimeout(this.TypingTimer);
    this.TypingTimer = setTimeout(function (index) {
      return function () {
        that.DoneTyping(index)
      }
    }(this.ExpenseServices), this.DoneTypingInterval);
  }

  DoneTyping(e) {
    this.SearchReport(this.Options);
  }

  OnChangeLastTime(value) {
    this.Options.last = value;
    this.ExpenseServices.SearchReports(this.Options);
  }

  OnChangeFromDate(date) {
    this.Options.from = date;
  }

  OnChangeEndDate(date) {
    this.Options.end = date;
  }

  isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
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