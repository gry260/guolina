
<!--
<br /><br />

<h2>Add a SubCategory</h2>
<form [formGroup]="categorySubTypeForm" #eform="ngForm" (ngSubmit)="onSubmit(eform.value)" >
     <select name="category_id" formControlName="category_obj">
         <option *ngFor="let item of listCategories; let i = index" [ngValue]="item">
             {{item.name}}
         </option>
     </select>
    <input type="text" formControlName="name">
    <button type="submit">Submit</button>
</form>


<h2>SubCategory List</h2>
<li *ngFor="let item of UserSubCategoryDbArray">
    {{ item.name }}
    <div *ngFor="let i of item.data">
        {{i.subcategory_name}}
        <button (click)="onDel(i.id)">Delete</button>
    </div>
</li>
-->