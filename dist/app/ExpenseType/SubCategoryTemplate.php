<div class="card" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title">Manage Your Subcategory(s)</h3>
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
        <div class="form-group">
          <label>Subcategory
            <input type="text" formControlName="name" size="28" class=" form-control form-control-sm" placeholder="To Your Subcategory Under a Category">
          </label>
        </div>
        <div class="form-group">
          <label>&nbsp;
          <input type="submit" class="btn form-control btn-sm btn-primary rounded" value="Add a Subcategory" />
          </label>
        </div>
        </div>
    </form>

    <hr />
    <h6><strong>SubCategory List</strong></h6>
    <ul class="item-list">
      <li class="item" *ngFor="let item of UserSubCategoryDbArray">
        <div class="alert alert-info" style="padding:2px; color:black">   {{ item.name }}</div>
        <div class="item-row" *ngFor="let i of item.data" style="height: 35px;">
          <div class="item-col item-col-title"><label>
              <span>      {{i.subcategory_name}}</span>
            </label></div>
          <div class="item-col fixed item-col-actions-dropdown">
            <div class="item-actions-dropdown"><a class="item-actions-toggle-btn" (click)="onDel(i.id)">
                <i class="fa fa-remove"></i>
              </a>
            </div>
          </div>
        </div>
      </li>
    </ul>
   </div>
</div>
