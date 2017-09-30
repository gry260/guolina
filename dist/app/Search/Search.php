<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 15px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-database" style="margin-top: 3px;"></i>&nbsp;Reports</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-2" *ngFor="let item of label; let i = index">
      <canvas baseChart [labels]="item" [data]="dataSet[i]" [colors]="colorsUndefined" [chartType]="type"></canvas>
    </div>
  </div>
  <ul *ngFor="let item of p; let i = index" #category style="margin-top: 15px;">
    <input type="checkbox" #ccategory_checkbox (click)="OnClickUpdateCategory(item.category_id, item.user_category_id, i, ccategory_checkbox)"/>
    {{ item.name }}
    <div *ngIf="p3[i]" #sc3>
      <li *ngFor="let s of p3[i]; let j = index" style="margin-left: 50px;">
        <input type="checkbox" #subcategory (click)="OnCLickUpdateSubCategory(item.category_id, item.user_category_id,  s.id, s.type, i, subcategory)"/>
        {{s.name}}
      </li>
    </div>
  </ul>
  <div class="d-flex">
    <div class=" ml-2">
      <label class="form-control-label">Name
        <input type="text" class="form-control form-control-sm" name="name"
               (keyup)="OnClickUpdateName(name.value)" #name/>
      </label>
    </div>
  </div>
  <div class="d-flex">
    <div class=" ml-2">
      <label>Price
        <select class="form-control form-control-sm" name="poperator1" #poperator1>
          <option>≈</option>
          <option>=</option>
          <option><</option>
          <option>></option>
        </select>
      </label>
    </div>
    <div class=" ml-1">
      <label>&nbsp;
        <input type="text" class="form-control form-control-sm" name="price1" #price1 (input)="OnClickUpdatePrice(poperator1.value, price1.value, 0)"/>
      </label>
    </div>
    <div class=" ml-1 mr-1">
      <label>&nbsp;
        <h5>And</h5>
      </label>
    </div>
    <div class="">
      <label>&nbsp;
        <select class="form-control form-control-sm" name="poperator2" #poperator2>
          <option>≈</option>
          <option>=</option>
          <option><</option>
          <option>></option>
        </select>
      </label>
    </div>
    <div class="ml-1">
      <label>&nbsp;
        <input type="text" class="form-control form-control-sm" name="price2" #price2 (keyup)="OnClickUpdatePrice(poperator2.value, price2.value, 1)"/>
      </label>
    </div>
  </div>
  <div class="d-flex">
    <div class=" ml-2">
      <label>Last Time
        <select class="form-control form-control-sm" name="last_name" #lasttime (change)="OnChangeLastTime(lasttime.value)">
          <option></option>
          <option>This Month</option>
          <option>Last Month</option>
          <option>Last 3 Months</option>
          <option>Last 6 Months</option>
          <option>This Year</option>
          <option>Last Year</option>
        </select>
      </label>
    </div>
  </div>
  <div class="d-flex">
    <div class=" ml-2">
      <label style="margin-bottom: 0px;">From </label>
      <input type="text" class="form-control form-control-sm" (click)="from.toggle()" name="dp" ngbDatepicker #from="ngbDatepicker" ngModel (ngModelChange)="onDateFromChange($event)"/>
    </div>
    <div class=" ml-1">
      <label style="margin-bottom: 0px;">Until</label>
      <input type="text" class="form-control form-control-sm" ng-change="selectDate(dt)" ngModel (ngModelChange)="onDateUntilChange($event)" (click)="end.toggle()" name="dp" ngbDatepicker #end="ngbDatepicker"/>
    </div>
  </div>
</div>










