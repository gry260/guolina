import {Component, Input, Directive, Pipe, DynamicComponentLoader,  ElementRef, ViewChild, ViewChildren, Output, EventEmitter, ChangeDetectionStrategy, ComponentFactoryResolver, ViewContainerRef,  ElementRef, ComponentRef} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {Http, Response} from '@angular/http';
import {Injectable, ViewChild} from '@angular/core';
import 'rxjs/add/operator/map';
import {ExpenseService} from "../services/expense";
import {CategoryComponent} from "app/ExpenseType/Category";
import {NgbModal, NgbActiveModal, ModalDismissReasons} from '@ng-bootstrap/ng-bootstrap';
import {NgbInputDatepicker} from '@ng-bootstrap/ng-bootstrap';
import {LoginComponent} from "app/Users/Login.components";
import {ChartsModule, Color} from 'ng2-charts';

import {Observable} from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';


@Component({
    selector: 'expense',
    templateUrl: 'app/ExpenseType/ExpenseTemplate.php',
    styles: [`
    .dark-modal .modal-content {
      background-color: #292b2c;
      color: white;
    }
    .dark-modal .close {
      color: white;
    }
  `]
})


@Injectable()
export class ExpenseComponent {

    ele:ElementRef;
    SelectedDate:any;
    inputControl:FormControl;
    @Output('create') create:EventEmitter<string> = new EventEmitter<string>();
    closeResult:string;
    modalService:NgbModal;
    @Input() Expenses;
    //@ViewChild('cc', {read: ViewContainerRef}) s: ViewContainerRef;
    ExpensesArray:Array;
    ExpenseForm:any;
    ListCategories:any;
    ListSubCategories:any;
    ExpenseService:ExpenseService;
    IsUpdate:boolean;

    user_id:number;
    name:string;
    price:any;
    date:string;
    comment:string;
    subcategory_id:number;
    user_category_id:number;
    category_id:number;
    user_category_id:number;
    modalRef:any;
    keywords = new Array();
    categoryField = false;
    subcategoryField = false;
    priceField = false;
    datePurchased =  false;
    priceNumeric = false;


    search = (text$:Observable<string>) =>
        text$
            .debounceTime(200)
            .distinctUntilChanged()
            .map(term => term.length < 2 ? []
                : this.keywords.filter(v => v.toLowerCase().indexOf(term.toLowerCase()) > -1).slice(0, 10));

    justAdded : boolean;
    justDeleted : boolean;
    justUpdated: boolean;


    //@Injectable KeyWords;

    //@ViewChild('name', {read: ViewContainerRef}) dynCmp: ViewContainerRef;
    //public cmpRef: ComponentRef;
    //dcl : any;
    //c: CategoryKeyWords;

    constructor(e:ExpenseService, private modalService:NgbModal, private activeModal:NgbActiveModal) {
        this.ExpenseService = e;
        this.IsUpdate = false;
        this.justAdded = false;
        this.justDeleted = false;
        this.justUpdated = false;
    }

    open(content, action) {
        if (action == 'add') {
            this.ExpenseForm = new FormGroup({
                category_obj: new FormControl(),
                subcategory: new FormControl(),
                name: new FormControl(),
                price: new FormControl(),
                date: new FormControl(),
                comment: new FormControl(),
                id: new FormControl(),
            });
            this.SelectedDate = '';
        }
        this.modalRef = this.modalService.open(content, {windowClass: 'dark-modal'});
    }

    ngOnInit() {
        if (this.isJson(this.Expenses)) {
            this.ExpensesArray = JSON.parse(this.Expenses);
        }

        if (this.ExpensesArray == null) {
            this.ExpensesArray = new Array();
        }

        this.ExpenseForm = new FormGroup({
            category_obj: new FormControl(''),
            subcategory: new FormControl(''),
            name: new FormControl(''),
            price: new FormControl(),
            date: new FormControl(''),
            comment: new FormControl(''),
        });
        this.ListCategories = CategoryComponent.get();
    }

    onChange(id, type) {
        if (LoginComponent.getUserID()) {
            if (id.includes(":")) {
                var res = id.split(":");
                id = parseInt(res[1].trim());
            }
            var Observables = this.ExpenseService.GetSubCategory(id, type.options[type.selectedIndex].getAttribute("class"), LoginComponent.getUserID());
            Observables.subscribe((res => {
                this.ListSubCategories = res.json();
            }));
        }
        //this.ListSubCategories = data;

        this.ExpenseService.GetCategoryKeyWords(id).subscribe(res => {
            if(res.json()) {
              if (typeof (res.json()) == 'object') {
                this.keywords = res.json();
              }
            }
        });

    }

    onSubmit(c, subcategory_obj, name, price, date, comment, id) {

        !c.value ?   this.categoryField = true : this.categoryField = false;
        !subcategory_obj.value ? this.subcategoryField = true: this.subcategoryField = false;
        !price.value ? this.priceField = true : this.priceField = false;
        !date._elRef.nativeElement.value ? this.datePurchased = true : this.datePurchased = false;

        if(this.categoryField == true || this.subcategoryField == true || this.priceField == true || this.datePurchased == true){
            return;
        }

        this.isNumeric(price.value) == false ? this.priceNumeric = true : this.priceNumeric = false;
        var SubmittedObj = {
            user_id: LoginComponent.getUserID(),
            category_name: c.options[c.selectedIndex].innerHTML,
            subcategory_name: subcategory_obj.options[subcategory_obj.selectedIndex].innerHTML,
            id: id.value != null ? id.value : null,
            name: name.value != null ? name.value : null,
            price: price.value != null ? price.value : null,
            date: date._elRef.nativeElement.value,
            comment: comment.value != null ? comment.value : null,
            category_id: c.options[c.selectedIndex].getAttribute("class") == 'c' ? parseInt(c.value) : null,
            user_category_id: c.options[c.selectedIndex].getAttribute("class") == 'u' ? parseInt(c.value) : null,
            subcategory_id: subcategory_obj.options[subcategory_obj.selectedIndex].getAttribute("class") == 'c' ? parseInt(subcategory_obj.value) : null,
            user_subcategory_id: subcategory_obj.options[subcategory_obj.selectedIndex].getAttribute("class") == 'u' ? parseInt(subcategory_obj.value) : null,
        }

        if (LoginComponent.getUserID()) {
            if (this.IsUpdate === true) {
                this.ExpenseService.UpdateExpense(SubmittedObj).subscribe(
                    data => {
                        this.modalRef.close();
                    },
                    err => console.log(err),
                    () => console.log('Request Completed')
                );
                for (var i in this.ExpensesArray) {
                    if (this.ExpensesArray[i].id == SubmittedObj.id) {
                        for (var k in SubmittedObj) {
                            this.ExpensesArray[i][k] = SubmittedObj[k];
                        }
                    }
                }
                this.justDeleted = false;
                this.justAdded = false;
                this.justUpdated = true;
            }
            else {
                var Observables = this.ExpenseService.AddExpense(SubmittedObj);
                Observables.subscribe((res => {
                    SubmittedObj.id = res.text().trim();
                    this.ExpensesArray.push(SubmittedObj);
                }));
                this.modalRef.close();
                this.justDeleted = false;
                this.justAdded = true;
                this.justUpdated = false;
            }
        }
    }

    /*
     OnNameChange(value) {
     if(value.length>0) {
     this.c = new CategoryKeyWords(this);
     this.remove();
     this.cmpRef = this.dcl.loadNextToLocation(CategoryKeyWords, this.dynCmp);
     }
     else{
     this.remove();
     }
     }
     */

    isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    isNumeric(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }

    onDelete(id) {
        if (LoginComponent.getUserID()) {
            this.ExpenseService.RemoveExpense({id: id, user_id: LoginComponent.getUserID()}).subscribe(data => {
                this.justDeleted = true;
                this.justAdded = false;
                this.justUpdated = false;
                for (var i in this.ExpensesArray) {
                    if (this.ExpensesArray[i].id == id) {
                        this.ExpensesArray.splice(i, 1);
                        return;
                    }
                }
            });
        }
    }

    searchExpenseById(ExpenseID, row) {
      row.className = 'table-success';
        if (LoginComponent.getUserID()) {
            for (var i in this.ExpensesArray) {
                if (ExpenseID == this.ExpensesArray[i].id) {
                    this.SelectedDate = this.ExpensesArray[i].date;
                    let type = (this.ExpensesArray[i].user_category_id) ? 'u' : 'c';
                    this.ExpenseService.GetSubCategory(parseInt(this.ExpensesArray[i].category_id), type, LoginComponent.getUserID()).subscribe((data) => {
                        this.ListSubCategories = data.json();
                    }, error => {
                    });
                    this.ExpenseForm = new FormGroup({
                        category_obj: new FormControl(parseInt(this.ExpensesArray[i].category_id)),
                        subcategory: new FormControl(parseInt(this.ExpensesArray[i].subcategory_id)),
                        name: new FormControl(this.ExpensesArray[i].name),
                        price: new FormControl(this.ExpensesArray[i].price),
                        date: new FormControl(this.ExpensesArray[i].date),
                        comment: new FormControl(this.ExpensesArray[i].comment),
                        id: new FormControl(this.ExpensesArray[i].id),
                    });
                }
            }
        }
        this.IsUpdate = true;
        return;
    }

    /*
     getKeyWords()
     {
     return this.KeyWords;
     }

     private remove() {
     this.cmpRef && this.cmpRef.then((ref: ComponentRef) => ref.destroy());
     }
     */
}


/*
 @Component({
 selector: '',
 templateUrl: 'app/ExpenseType/AutoCompleteContainer.php'
 })

 @Injectable()
 export class CategoryKeyWords
 {
 E: ExpenseComponent;
 Words: any;
 constructor(e: ExpenseComponent)
 {
 this.E = e;
 this.Words = this.E.getKeyWords();
 }
 }
 */