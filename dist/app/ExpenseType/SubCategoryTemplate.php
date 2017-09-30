<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-edit" style="margin-top:3px;"></i>&nbsp;Add or Delete Subcategory(s) Under Category(s)</h3>
    </div>
  </div>
  <div class="card-block" style="padding-bottom: 0px;">
    <form [formGroup]="categorySubTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)">
      <div class="d-flex">
        <div class="form-group">
          <label>Category
            <select name="category_id" formControlName="category_obj" class="form-control form-control-sm">
              <option *ngFor="let item of listCategories; let i = index" [ngValue]="item">
                {{item.name}}
              </option>
            </select>
          </label>
        </div>
        </div>
      <div class="d-flex">
        <div class="form-group">
          <label>Subcategory
            <input type="text" formControlName="name" size="28" class=" form-control " placeholder="Your SubCategory Name Under a Category">
          </label>
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
