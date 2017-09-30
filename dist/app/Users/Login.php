<form method="post" action="./UserActions.php?adf" #f="ngForm" (ngSubmit)="onSubmit(f.value)" [formGroup]="e">
  <div class="d-flex">
    <div class="input-container ml-1"><label class="control-label" style="margin-bottom: 0px;">Username </label>
        <input type="text" class="form-control boxed" formControlName="username"/>
    </div>
    <div class="input-container ml-1"><label class="control-label" style="margin-bottom: 0px;">Password </label>
        <input type="password" class="form-control boxed " formControlName="password"/>
    </div>
    <div class="input-container ml-1">
        <label class="control-label" style="margin-bottom: 0px;">&nbsp; </label>
        <button type="submit" class="btn btn-primary form-control boxed">
            <i class="fa fa-sign-in fa-lg"></i> Sign In
        </button>
    </div>
  </div>
</form>
