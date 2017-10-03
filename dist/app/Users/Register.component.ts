import {Component} from '@angular/core';
import {FormGroup, FormControl} from '@angular/forms';
import {UserService} from "../services/user";
import {LoginComponent} from "../Users/Login.components";

@Component({
    selector: 'register',
    templateUrl: './Register.php'
})
export class RegisterComponent {
    e: any;
    ue:any;
    usernamefield= false;
    firstnamefield = false;
    lastnamefield = false;
    passwordfield= false;
    confirmpasswordfield = false;

    passwordConfirm = false;
    userNameTaken = false;

    LoginComponent: LoginComponent;
    constructor(ue: UserService, LoginComponent: LoginComponent) {
        this.LoginComponent = LoginComponent;
        this.ue = ue;
        this.e = new FormGroup({
            first_name: new FormControl(''),
            last_name: new FormControl(''),
            username: new FormControl(''),
            password: new FormControl(''),
            confirm_password: new FormControl(''),
        });
    }
    ngOnInit() {
    }

    onSubmit(form){

       !form.first_name ?   this.firstnamefield= true : this.firstnamefield = false;
       !form.last_name ?   this.lastnamefield= true : this.lastnamefield= false;
       !form.username ?   this.usernamefield= true : this.usernamefield= false;
       !form.password ?   this.passwordfield= true : this.passwordfield= false;
       !form.confirm_password ?   this.confirmpasswordfield = true : this.confirmpasswordfield =  false;

       if(this.firstnamefield == true || this.lastnamefield == true || this.usernamefield == true ||
        this.passwordfield == true || this.confirmpasswordfield == true){
        return;
       }

       form.password !== form.confirm_password ? this.passwordConfirm = true : this.passwordConfirm = false;
       if(this.passwordConfirm == true){
         return;
       }

       this.ue.checkUser(form.username).subscribe(res => {
         res.text() == 1 ? this.userNameTaken = true : this.userNameTaken = false;
         if(this.userNameTaken == true){
           return;
         }
       });

        this.ue.AddUser(form).subscribe(res => {
            LoginComponent.setUserID(res.text().trim());
            window.location.href='./';
        });
    }

}