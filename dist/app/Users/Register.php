<button type="button" class="btn btn-primary" style="margin-right: 225px;" placement="bottom"
        [ngbPopover]="popContent">
 <i class="fa fa-registered fa-lg"></i> Sign Up</button>

<ng-template #popContent>
  <div class="card sameheight-item sales-breakdown" style="border-radius: 5px; width:316px; height: auto;" data-exclude="xs,sm,lg">
    <div class="card-header">
      <div class="header-block">
        <h3 class="title">Sign Up</h3>
      </div>
      <hr />
    </div>
    <form id="signup-form" action="/index.html" method="POST" novalidate="novalidate"  #f="ngForm" (ngSubmit)="onSubmit(f.value)" [formGroup]="e">
      <div class="form-group">
        <label for="firstname">Username</label>
        <div class="row">
          <div class="col-sm-12"> <input type="text" formControlName="username" class="form-control underlined" name="username" id="username" placeholder="Enter username" required="" aria-required="true">
              <p [hidden]="usernamefield == false" class="text-danger" style="font-weight:600;">
                  Username field is required field.
              </p>
              <p [hidden]="userNameTaken == false" class="text-danger" style="font-weight:600;">
                  That username is taken. Try another.
              </p>
          </div>
        </div>
      </div>
      <div class="form-group"> <label for="firstname">Name</label>
        <div class="row">
          <div class="col-sm-6"> <input type="text" formControlName="first_name" class="form-control underlined" name="firstname" id="firstname" placeholder="Enter firstname" required="" aria-required="true">
              <p [hidden]="firstnamefield == false" class="text-danger" style="font-weight:600;">
                  First Name field is required field.
              </p>

          </div>
          <div class="col-sm-6"> <input type="text" formControlName="last_name" class="form-control underlined" name="lastname" id="lastname" placeholder="Enter lastname" required="" aria-required="true">
              <p [hidden]="lastnamefield == false" class="text-danger" style="font-weight:600;">
                 Last Name field is required field.
              </p>
          </div>
        </div>
      </div>
      <div class="form-group"> <label for="password">Password</label>
        <div class="row">
          <div class="col-sm-6"> <input type="password" formControlName="password" class="form-control underlined" name="password" id="password" placeholder="Enter password" required="" aria-required="true">
              <p [hidden]="passwordfield == false" class="text-danger" style="font-weight:600;">
                  Password field is required field.
              </p>
              <p [hidden]="passwordConfirm == false" class="text-danger" style="font-weight:600;">
                  These passwords don't match. Try again?
              </p>
          </div>
          <div class="col-sm-6"> <input type="password"  formControlName="confirm_password" class="form-control underlined" name="retype_password" id="retype_password" placeholder="Re-type password" required="" aria-required="true">
              <p [hidden]="confirmpasswordfield == false" class="text-danger" style="font-weight:600;">
                 Confirm Password field is required field.
              </p>
          </div>
        </div>
      </div>
      <div class="form-group" style="padding-bottom:15px; padding-right:10px"> <button type="submit" class="btn btn-block btn-primary">Sign Up</button> </div>
    </form>
  </div>
</ng-template>
