<div class="card card-primary" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 15px;">
  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title"><i class="fa fa-database" style="margin-top: 3px;"></i>&nbsp;Reports</h3>
    </div>
  </div>
  <div class="card-block">

      <p class="bg alert-info" style="padding:5px;">
          <strong>&nbsp;<i class="fa fa-info-circle" aria-hidden="true"> </i>&nbsp; By Default, the report has filtered with in this month only. </strong>
      </p>
      <div *ngIf="hasResult == false" class="row justify-content-center">
          <div class="alert alert-danger" style="background:#f2dede; width: 100%; color: #a94442; border: #ebcccc;">
            <i class="fa fa-warning"></i>&nbsp;
              <b>Your Search does not return any results. Please select different filter.
              </b>
          </div>
      </div>

    <div class="row" *ngIf="hasResult == true">
      <div class="col-3 mt-1" *ngFor="let item of label; let i = index">
          <label><i class="fa fa-pie-chart fa-lg"></i> Count Percentages By {{ TypeLabels[i]  }}</label>
        <canvas baseChart [labels]="item" [data]="dataSet[i]" [colors]="colorsUndefined" [chartType]="type"></canvas>
      </div>
    </div>

    <h4 style="margin-top:15px;"><i class="fa fa-filter"></i>&nbsp;Filter</h4>
    <div class="row">
        <div class="ml-1 col-4">
            <label>
                Category(s) and Subcategory(s)
                <ul *ngFor="let item of p; let i = index" #category>
                    <input type="checkbox" #ccategory_checkbox
                           (click)="OnClickUpdateCategory(item.category_id, item.user_category_id, i, ccategory_checkbox)"/>
                    {{ item.name }}
                    <div *ngIf="p3[i]" #sc3>
                        <li *ngFor="let s of p3[i]; let j = index" style="margin-left: 50px;">
                            <input type="checkbox" #subcategory
                                   (click)="OnCLickUpdateSubCategory(item.category_id, item.user_category_id,  s.id, s.type, i, subcategory)"/>
                            {{s.name}}
                        </li>
                    </div>
                </ul>
            </label>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label class="form-control-label">Tag
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-tags"></i></span>
                    <input type="text" class="form-control" name="name"
                           (keyup)="OnClickUpdateName(name.value)" #name/>
                </div>
            </label>
          </div>
        </div>


        <div class="col-3 flex-row">
            <div class="form-group" style="width:100%; margin-right:25px;">
                <label>Price
                    <select class="form-control" name="poperator1" #poperator1 style="width:150%;">
                        <option>≈</option>
                        <option>=</option>
                        <option><</option>
                        <option>></option>
                    </select>
                </label>
            </div>
            <div class="form-group">
                    <label class="form-control-label">&nbsp;
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                            <input type="text" class="form-control" name="price1" #price1
                                   (input)="OnClickUpdatePrice(poperator1.value, price1.value, 0)"/>
                        </div>
                    </label>

            </div>

        </div>
        </div>


      <div class="row">
          <div class="ml-1 col-4">
              <label>Last Time
                  <select class="form-control" name="last_name" #lasttime
                          (change)="OnChangeLastTime(lasttime.value)">
                      <option></option>
                      <option selected>This Month</option>
                      <option>Last Month</option>
                      <option>Last 3 Months</option>
                      <option>Last 6 Months</option>
                      <option>This Year</option>
                      <option>Last Year</option>
                  </select>
              </label>
          </div>

          <div class="col-3">
              <label class="control-label" style="margin-bottom: 0px;">After </label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input type="text" class="form-control" (click)="from.toggle()" name="dp" ngbDatepicker
                     #from="ngbDatepicker" ngModel (ngModelChange)="onDateFromChange($event)"/>
              </div>
          </div>
          <div class="col-3">
              <label style="margin-bottom: 0px;">Until</label>
              <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
              <input class="control-label" type="text" class="form-control" ng-change="selectDate(dt)" ngModel
                     (ngModelChange)="onDateUntilChange($event)" (click)="end.toggle()" name="dp" ngbDatepicker
                     #end="ngbDatepicker"/>
              </div>
          </div>
      </div>

  </div>
</div>










