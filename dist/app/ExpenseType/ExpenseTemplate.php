<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-th-list" style="margin-top: 3px;"></i>&nbsp;Expense Record(s)</h3>
      <button (click)="open(content, 'add')" type="button" class="btn btn-warning btn-sm rounded ml-5  ">
        <i class="fa fa-edit" aria-hidden="true"></i>&nbsp;Add a New Expense Record
      </button>
    </div>
  </div>
  <div class="table-responsive">
      <div class="row justify-content-center" *ngIf="justAdded == true">
          <div class="alert alert-success" style="background:#dff0d8; width: 100%; color: #3c763d; border: #d0e9c6;">
              <i class="fa fa-check"></i>&nbsp;
              <b>
                  Record Added.
              </b>
          </div>
      </div>
      <div class="row justify-content-center" *ngIf="justUpdated== true">
          <div class="alert alert-success" style="background:#dff0d8; width: 100%; color: #3c763d; border: #d0e9c6;">
              <i class="fa fa-check"></i>&nbsp;
              <b>
                  Record Updated.
              </b>
          </div>
      </div>

      <div class="row justify-content-center" *ngIf="justDeleted == true">
          <div class="alert alert-danger" style="background:#f2dede; width: 100%; color: #a94442; border: #ebcccc;">
              <i class="fa fa-check"></i>&nbsp;
              <b>
                  Record Deleted.
              </b>
          </div>
      </div>

    <table class="table table-striped table-hover">
      <thead>
      <tr>
        <th>Category</th>
        <th>Subcategory</th>
        <th>Name</th>
        <th>Price</th>
        <th>Date</th>
        <th>Comments</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
      <tr #eachrow *ngFor="let item of ExpensesArray;">
        <td> {{ item.category_name }}</td>
        <td> {{ item.subcategory_name }}</td>
        <td> {{ item.name}}</td>
        <td>{{ item.price }}</td>
        <td>{{item.date}}</td>
        <td>{{ item.comment }}</td>
        <td>
          <button #edit (click)="searchExpenseById(item.id, eachrow)" (click)="open(content, edit)" class="btn btn-sm btn-info">
            <i class="fa  fa-1.5x fa-edit"></i>&nbsp;Edit
          </button>
          <button (click)="onDelete(item.id)" class="btn btn-sm btn-danger"><i class="fa  fa-1.5x fa-remove"></i>&nbsp;Delete
          </button>
        </td>
      </tr>
      </tbody>
    </table>
  </div>
</div>
<template #content let-c="close" let-d="dismiss">
  <div class="modal-body" style="margin-top: 175px;">
    <h3 class="title"><i class="fa fa-wpforms" aria-hidden="true"></i>&nbsp;Expense Form</h3>
    <hr/>
    <form role="form" [formGroup]="ExpenseForm" #Expenseform="ngForm" (ngSubmit)="onSubmit(category, subcategory_obj, name, price, date, comment, id)">
      <div class="d-flex">
        <div class="form-group">
          <label>Category
            <select class="form-control form-control" formControlName="category_obj" #category (change)="onChange(category.value, category)">
              <option *ngFor="let ii of ListCategories; let i = index" [value]="ii.id" [ngClass]="ii.t" [ngValue]="ii.id">
                {{ii.name}}
              <option>
            </select>
              <p [hidden]="categoryField == false" class="text-danger">
                  Category is required.
              </p>
          </label>
        </div>
        <div class="form-group ml-2">
          <label>
            Subcategory
            <select class="form-control form-control" name="subcategory_id" formControlName="subcategory" #subcategory_obj>
              <option *ngFor="let item of ListSubCategories; let i = index" [ngValue]="item" [ngClass]="item.t" [value]="item.id">
                {{item.name}}
              </option>
            </select>
              <p [hidden]="subcategoryField == false" class="text-danger">
                  Subategory name is required.
              </p>
          </label>
        </div>
      </div>
      <div class="d-flex">
        <div class="form-group">
          <label>
            Tag
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                <input type="text" class="form-control form-control" formControlName="name" placeholder="name" [ngbTypeahead]="search" #name>
              </div>
          </label>
        </div>
        </div>
      <div class="d-flex">
        <div class="form-group">
          <label>
            Price
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
            <input type="text" class="form-control form-control" formControlName="price" placeholder="price" #price/>
              </div>
              <p [hidden]="priceField == false" class="text-danger">
                  Price Field is a required field.
              </p>

              <p [hidden]="this.priceNumeric == false" class="text-danger">
                  Price must be a numeric value.
              </p>
          </label>
        </div>
        <div class="form-group ml-2">
          <label style="margin-bottom: 0px;">
            Date Purchased </label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-check-o"></i></span>
          <input type="text" [value]="SelectedDate" ngbDatepicker #date="ngbDatepicker" (click)="date.toggle()" class="form-control fa fa-edit" formControlName="date" placeholder="">
          </div>
            <p [hidden]="datePurchased== false" class="text-danger" style="font-weight:600;">
                Date Purchased is required field.
            </p>
        </div>
      </div>
      <div class="d-flex">
        <div class="form-group">
          <label>
            Comments
            <textarea rows="4" cols="70" class="form-control-sm form-control" #comment></textarea>
          </label>
        </div>
        <input type="hidden" formControlName="id" placeholder="name" #id>
      </div>
      <div class="d-flex">
        <div class="form-group">
          <button type="submit" class="btn btn-primary rounded">Submit</button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-outline-dark" (click)="c('Close click')">Close</button>
  </div>
</template>
