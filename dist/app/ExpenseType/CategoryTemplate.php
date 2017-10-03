<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-edit" style="margin-top:3px;"></i>&nbsp;Add or Delete Category(s)</h3>
    </div>
  </div>
  <div class="card-block" style="padding-bottom: 0px;">
      <div class="row justify-content-center" *ngIf="justAdded == true">
          <div class="alert alert-success" style="background:#dff0d8; width: 100%; color: #3c763d; border: #d0e9c6;">
              <i class="fa fa-check"></i>&nbsp;
              <b>
                Category Added.
              </b>
          </div>
      </div>

      <div class="row justify-content-center" *ngIf="justDeleted == true">
          <div class="alert alert-success" style="background:#f2dede; width: 100%; color: #a94442; border: #ebcccc;">
              <i class="fa fa-check"></i>&nbsp;
              <b>
                  Category Deleted.
              </b>
          </div>
      </div>


    <form [formGroup]="CategoryTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)">
      <div class="d-flex">
        <div class="form-group">
          <label>Category
              <input type="text" [(ngModel)]="query" class="form-control" formControlName="name" placeholder="Category Name" required  />
              <p [hidden]="required == false" class="text-danger">
                  Category Name is required.
              </p>
          </label>
        </div>
        <div class="form-group ml-1">
          <label>&nbsp;
            <input type="submit" value="Add" size="5" class="form-control btn btn-primary rounded"/>
          </label>
        </div>
      </div>
    </form>
    <ul class="item-list">
      <li class="item" *ngFor="let item of UserCategoryArray" style="height:35px;">
        <div class="item-row">
          <div class="item-col item-col-title"><label>
              <span>{{ item.name }}</span>
            </label></div>
          <div class="item-col fixed item-col-actions-dropdown">
            <div class="item-actions-dropdown"><a class="item-actions-toggle-btn" (click)="onDel(item.id)">
                <i class="fa fa-remove"></i>
              </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<!--
<form [formGroup]="CategoryTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)" >
    <input type="text" formControlName="name">
    <button type="submit">Submit</button>
</form>
<h2>Category List</h2>
<ul>
    <li *ngFor="let item of UserCategoryArray">
        {{ item.name }}
        <button (click)="onDel(item.id)">Delete</button>
    </li>

</ul>
-->


