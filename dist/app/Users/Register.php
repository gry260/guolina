<button type="button" class="btn btn-primary" style="margin-right: 225px;" placement="bottom"
        [ngbPopover]="popContent">
  Sign Up</button>

<ng-template #popContent>
  <div class="card sameheight-item sales-breakdown" style="border-radius: 5px; width:316px; height: auto;" data-exclude="xs,sm,lg">
    <div class="card-header">
      <div class="header-block">
        <h3 class="title">Sign Up</h3>
      </div>
      <hr />
    </div>
    <form method="post" action="./adfsdf.php"  #f="ngForm" (ngSubmit)="onSubmit(f.value)" [formGroup]="e">
    <div class="card-block">
      <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">User Name: </label>
        <input type="text" class="form-control boxed form-control-sm" formControlName="username" />
      </div>
      <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">Password: </label>
        <input type="password" class="form-control boxed form-control-sm" formControlName="password"/>
      </div>
      <div class="form-group"><label class="control-label" style="margin-bottom: 0px;">Confirm Password: </label>
        <input type="password" class="form-control boxed form-control-sm" formControlName="confirm_password"/>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-success btn-sm" />
      </div>
    </div>
    </form>
  </div>
</ng-template>
