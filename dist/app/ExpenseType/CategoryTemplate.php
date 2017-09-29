<div class="card" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 0px;">

  <div style="display: block">

    <!--
    <canvas baseChart
            [data]="doughnutChartData"
            [labels]="doughnutChartLabels"
            [chartType]="doughnutChartType"
            (chartHover)="chartHovered($event)"
            (chartClick)="chartClicked($event)"></canvas>

            -->
  </div>


  <div class="card-header bordered">
    <div class="header-block">
      <h3 class="title">Manage Your Category(s)</h3>
    </div>
  </div>
  <div class="card-block" style="padding-bottom: 0px;">
      <form [formGroup]="CategoryTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)" >
        <div class="d-flex">
      <div class="form-group">
        <label> Add a Category
    <input type="text" class="form-control form-control-sm" formControlName="name">
        </label>
      </div>
      <div class="form-group">
        <label>&nbsp;
          <input type="submit" size="5" class="form-control btn btn-sm btn-primary rounded"  />
        </label>
        </div>
          </div>
        </form>

    <ul class="item-list">
      <li class="item" *ngFor="let item of UserCategoryArray">
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


