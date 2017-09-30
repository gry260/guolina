import {Component, Input, Directive, Pipe, ElementRef, ViewChild, ViewChildren} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {ExpenseService} from "../services/expense";
import {NgbDateStruct} from '@ng-bootstrap/ng-bootstrap';
import {LoginComponent} from "app/Users/Login.components";

const now = new Date();


@Component({
    selector: 'search',
    templateUrl: 'app/Search/Search.php'
})
export class SearchComponent {

    @Input() parameters;
    @ViewChildren('sc3') s:ElementRef;
    p = new Array();
    p2 = new Array();
    p3 = new Array();
    s:any;
    DoneTypingInterval:number;
    TypingTimer:any;
    NameTypingTimer:any;
    ExpenseServices:ExpenseService;
    Options:any;
    Reports = new Array();
    model:NgbDateStruct;
    date:{year: number, month: number};

    TypeLabels = ['Category(s)', 'Subcategory(s)', 'Tag(s)', 'Price(s)', 'Dates'] ;

    labels:string[] = ['Download Sales', 'In-Store Sales', 'Mail-Order Sales'];
    data:number[] = [350, 450, 100];
    type:string = 'pie';

    label = new Array();
    dataSet = new Array();


    constructor(e:ExpenseService) {
        this.ExpenseServices = e;
        this.DoneTypingInterval = 2000;
    }

    selectToday() {
        this.model = {year: now.getFullYear(), month: now.getMonth() + 1, day: now.getDate()};
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
        if(LoginComponent.getUserID()) {
            this.Reports = new Array();
            options.user_id = LoginComponent.getUserID();
            var Observables = this.ExpenseServices.SearchReports(options);
            Observables.subscribe((res => {
               // console.log(res.text());
               // return;
                if (res._body) {
                    var temp = res.json();
                    console.log(temp);
                    var tempCount = 0;
                    var total = new Array();
                    for (var k in temp) {
                        total[k] = 0;
                        for (var i in temp[k]) {
                            temp[k][i].count = !temp[k][i].count ? 0 : temp[k][i].count.trim();
                            total[k] += parseInt(temp[k][i].count);
                        }
                        tempCount++;
                    }
                    var tempCount = 0;
                    for (var k in temp) {
                        this.label[tempCount] = new Array();
                        this.dataSet[tempCount] = new Array();
                        for (var i in temp[k]) {
                            temp[k][i].name = !temp[k][i].name ? '' : temp[k][i].name.trim();
                            temp[k][i].count = !temp[k][i].count ? '' : temp[k][i].count.trim();
                            this.label[tempCount].push(temp[k][i].name.trim());
                            this.dataSet[tempCount].push(((temp[k][i].count.trim() / total[k]) * 100).toFixed(2));
                        }
                        tempCount++;
                        this.Reports.push({name: k, data: temp[k]});
                    }
                }
                else{
                    alert('sdfadsf');
                }
            }));
        }
    }

    OnClickUpdateName(name) {
        var that = this;
        if (name.length > 0) {
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
        this.SearchReport(this.Options);
    }

    onDateFromChange(date) {
        date = date.year + '-' + date.month + '-' + date.day;
        this.Options.from = date;
        this.SearchReport(this.Options);
    }

    onDateUntilChange(date) {
        date = date.year + '-' + date.month + '-' + date.day;
        this.Options.end = date;
        this.SearchReport(this.Options);
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