
<div class="card" data-exclude="xs,sm,lg" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="card-header bordered">
        <div class="header-block">
            <h3 class="title">Reports</h3>
        </div>
    </div>

    <table border="1" *ngFor="let item of Reports; let i = index" style="margin-top:100px;">
        <thead>
        <tr>
            <td colspan="2">{{item.name}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>Count</td>
        </tr>
        </thead>
        <tbody *ngFor="let r of item.data; let j = index">
        <tr>
            <td>{{ r.name }}</td>
            <td>{{ r.count }}</td>
        </tr>
        </tbody>
    </table>


    <form [formGroup]="SearchForm" #s="ngForm" style="margin-top: 15px;">
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
        <div class="d-flex">
        <div class="form-group ml-2">
            <label class="form-control-label">Name
            <input type="text" formControlName="name" class="form-control form-control-sm" name="name" (keyup)="OnClickUpdateName(name.value)" #name  />
            </label>
        </div>
        </div>
    </form>
</div>
<!--
<ul *ngFor="let item of p; let i = index">
    dd
   <ol *ngFor="let jitem of item; let j = index">>
            {{jitem}}
   </ol>
</ul>

-->


<!--
<table border="1" *ngFor="let item of Reports; let i = index" style="margin-top:100px;">
    <thead>
        <tr>
            <td colspan="2">{{item.name}}</td>
        </tr>
        <tr>
            <td>Name</td>
            <td>Count</td>
        </tr>
    </thead>
    <tbody *ngFor="let r of item.data; let j = index">
        <tr>
            <td>{{ r.name }}</td>
            <td>{{ r.count }}</td>
        </tr>
    </tbody>
</table>

<form [formGroup]="SearchForm" #s="ngForm">
    <ul *ngFor="let item of p; let i = index" #category>
        <input type="checkbox" #ccategory_checkbox (click)="OnClickUpdateCategory(item.category_id, item.user_category_id, i, ccategory_checkbox)" />
        {{ item.name }}
        <div *ngIf="p3[i]" #sc3>
            <li *ngFor="let s of p3[i]; let j = index" style="margin-left: 50px;" >
                <input type="checkbox"  #subcategory (click)="OnCLickUpdateSubCategory(item.category_id, item.user_category_id,  s.id, s.type, i, subcategory)"/>
                {{s.name}}
            </li>
        </div>
    </ul>

    <label>Name</label>
    <br/>
    <input type="text" formControlName="name" name="name" (keyup)="OnClickUpdateName(name.value)" #name  />
    <br/><br/>
    <label>Price</label>
    <br/>
    <select name="poperator1" formControlName="poperator1" #poperator1>
        <option>≈</option>
        <option>=</option>
        <option><</option>
        <option>></option>
    </select>
    <input type="text" name="price1"  formControlName="price1" #price1 (input)="OnClickUpdatePrice(poperator1.value, price1.value, 0)" />
    AND
    <select name="poperator2" formControlName="poperator2" #poperator2>
        <option>≈</option>
        <option>=
        </option>
        <option>
            <
        </option>
        <option>
            >
        </option>
    </select>
    <input type="text" name="price2"  formControlName="price2" #price2 (keyup)="OnClickUpdatePrice(poperator2.value, price2.value, 1)"/>
    <br/><br/>
    <label>Time</label>
    <br/>
    <select name="last_name" #lasttime (change)="OnChangeLastTime(lasttime.value)">
        <option>This Month</option>
        <option>Last Month</option>
        <option>Last 3 Months</option>
        <option>Last 6 Months</option>
        <option>This Year</option>
        <option>Last Year</option>
    </select>

    &nbsp; &nbsp;&nbsp;&nbsp;
    <label>Since</label>
    <input type="text" #from (change)="OnChangeFromDate(from.value)"/>

    <label>Before</label>
    <input type="text" #end (change)="OnChangeEndDate(end.value)"/>


    <!--
    <br/>
    By

    <input type="checkbox"/>
    Category


    <input type="checkbox"/>
    SubCategory

    <input type="checkbox"/>
    Item Name
</form>
-->









