<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-edit" style="margin-top:3px;"></i>&nbsp;Add or Delete Subcategory(s) Under Category(s)</h3>
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
    <form [formGroup]="categorySubTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)">
      <div class="d-flex">
        <div class="form-group">
          <label>Category
            <select name="category_id" formControlName="category_obj" class="form-control form-control-sm">
              <option *ngFor="let item of listCategories; let i = index" [ngValue]="item">
                {{item.name}}
              </option>
            </select>
              <p [hidden]="categoryField == false" class="text-danger">
                  Category is required.
              </p>
          </label>
        </div>
        </div>
      <div class="d-flex">
        <div class="form-group">
          <label>Subcategory
            <input type="text" [(ngModel)]="query" formControlName="name" size="28" class=" form-control " placeholder="Your SubCategory Name Under a Category">
          </label>
            <p [hidden]="subcategoryField == false" class="text-danger text-bold">
              <strong>  Subcategory name is required. </strong>
            </p>
        </div>

        <div class="form-group ml-1">
          <label>&nbsp;
          <input type="submit" class="btn form-control btn-primary rounded" value="Add a Subcategory" />
          </label>
        </div>
        </div>
    </form>
    <section class="section">
      <h4><i class="fa fa-list"></i>&nbsp;Subcategory List</h4>
      <ul>
        <li *ngFor="let item of UserSubCategoryDbArray">{{item.name}}
          <ul *ngFor="let i of item.data">
            <li>
              {{i.subcategory_name}}
              <a style="color:#9ba8b5; cursor: pointer" class="item-actions-toggle-btn float-right" (click)="onDel(i.id)">
                <i class="fa fa-remove"></i>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </section>
   </div>
</div>
