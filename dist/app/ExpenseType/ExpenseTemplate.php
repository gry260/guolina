<div class="card" data-exclude="xs,sm,lg">
    <div class="card-header bordered">
        <div class="header-block">
            <h3 class="title">Latest Expense Record(s)</h3>
            <a (click)="open(content)" style="color:white;" class="btn btn-primary btn-sm rounded ml-1">
                Add New
            </a>
        </div>
        <div class="header-block pull-right"><label class="search">
                <input class="search-input" placeholder="search...">
                <i class="fa fa-search search-icon"></i>
            </label>
            <div class="pagination"><a href="" class="btn btn-primary btn-sm rounded">
                    <i class="fa fa-angle-up"></i>
                </a> <a href="" class="btn btn-primary btn-sm rounded">
                    <i class="fa fa-angle-down"></i>
                </a></div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-sm table-hover">
            <thead>
            <tr>
                <th>Category</th>
                <th>SubCategory</th>
                <th>Name</th>
                <th>Price</th>
                <th>Date</th>
                <th>Comments</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr *ngFor="let item of ExpensesArray;">
                <td> {{ item.category_name }}</td>
                <td> {{ item.subcategory_name }}</td>
                <td> {{ item.name}}</td>
                <td>{{ item.price }}</td>
                <td>{{item.date}}</td>
                <td>{{ item.comment }}</td>
                <td><input class="btn btn-sm btn-warning rounded" type="button" name="update" value="Update"
                           (click)="open(content)" (click)="searchExpenseById(item.id)"/>
                    <input class="btn btn-sm btn-danger rounded" type="button" name="update" value="Delete"
                           (click)="onDelete(item.id)"/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<ng-template #content let-c="close" let-d="dismiss">
    <div class="modal-body" style="margin-top: 95px;">
        <form role="form" [formGroup]="ExpenseForm" #Expenseform="ngForm"
              (ngSubmit)="onSubmit(category, subcategory_obj, name, price, date, comment, id)">
            <div class="d-flex">
                <div class="form-group">
                    <label>Category
                        <select class="form-control form-control-sm" formControlName="category_obj" #category
                                (change)="onChange(category.value, category)">
                            <option *ngFor="let ii of ListCategories; let i = index" [value]="ii.id" [ngClass]="ii.t"
                                    [ngValue]="ii.id">
                                {{ii.name}}
                            <option>
                        </select>
                    </label>
                </div>
                <div class="form-group ml-2">
                    <label>
                        Subcategory
                        <select class="form-control form-control-sm" name="subcategory_id" formControlName="subcategory"
                                #subcategory_obj>
                            <option *ngFor="let item of ListSubCategories; let i = index" [ngValue]="item"
                                    [ngClass]="item.t"
                                    [value]="item.id">
                                {{item.name}}
                            </option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <label>
                        Title
                        <input type="text" class="form-control-sm form-control" formControlName="name"
                               placeholder="name"
                               (keyup)="OnNameChange(name.value)" #name>
                    </label>
                </div>
                <div class="form-group ml-2">
                    <label>
                        Price
                        <input type="text" class="form-control-sm form-control" formControlName="price"
                               placeholder="price" #price>
                    </label>
                </div>
                <div class="form-group ml-2">
                    <label>
                        Date Purchased
                        <input type="text" class="form-control-sm form-control" formControlName="date"
                               placeholder="date" #date>
                    </label>
                </div>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <label>
                        Comments
                        <textarea rows="4" cols="50" class="form-control-sm form-control" #comment>
            </textarea>
                    </label>
                </div>
                <input type="hidden" formControlName="id" placeholder="name" #id>
            </div>
            <div class="d-flex">
                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary rounded">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" (click)="c('Close click')">Close</button>
    </div>
</ng-template>
<!--
<div #c></div>
<h2>Expense</h2>
<div></div>

<form [formGroup]="ExpenseForm" #Expenseform="ngForm"
      (ngSubmit)="onSubmit(category, subcategory_obj, name, price, date, comment, id)">
  <select formControlName="category_obj"  #category (change)="onChange(category.value, category)">
    <option *ngFor="let ii of ListCategories; let i = index" [value]="ii.id" [ngClass]="ii.t" [ngValue]="ii.id">
      {{ii.name}} {{ii.id}}
    </option>
  </select>
  <select name="subcategory_id" formControlName="subcategory" #subcategory_obj>
    <option *ngFor="let item of ListSubCategories; let i = index" [ngValue]="item" [ngClass]="item.t" [value]="item.id">
      {{item.name}}
    </option>
  </select>
  <input type="hidden" formControlName="id" placeholder="name" #id>
  <input type="text" formControlName="name" placeholder="name" (keyup)="OnNameChange(name.value)" #name>
  <input type="text" formControlName="price" placeholder="price" #price>
  <input type="text" formControlName="date" placeholder="date" #date>
  <input type="text" formControlName="comment" placeholder="comment" #comment>
  <button type="submit">Submit</button>
</form>

<ol>
  <li *ngFor="let item of ExpensesArray; ">
    {{ item.category_name }}&nbsp; &nbsp;&nbsp;
    {{ item.subcategory_name }}&nbsp; &nbsp;&nbsp;
    {{ item.user_id }}&nbsp; &nbsp;&nbsp;
    {{ item.name }}&nbsp; &nbsp;&nbsp;
    {{ item.price }}&nbsp; &nbsp;&nbsp;
    {{ item.date }}&nbsp; &nbsp;&nbsp;
    {{ item.comment }}&nbsp; &nbsp;&nbsp;
    {{item.id}}
    <input type="button" name="update" value="update" (click)="searchExpenseById(item.id)"/>
    <button (click)="onDelete(item.id)">Delete</button>
  </li>
</ol>


<div>
  <h2>Hello</h2>
  This demonstrate ng-include equivalent of Angular2
  <button (click)="add1()">Add 1</button>
  <button (click)="add2()">Add 2</button>
</div>

-->