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
    LoginComponent: LoginComponent;
    constructor(ue: UserService, LoginComponent: LoginComponent) {
        this.LoginComponent = LoginComponent;
        this.ue = ue;
        this.e = new FormGroup({
            username: new FormControl(''),
            password: new FormControl(''),
            confirm_password: new FormControl(''),
        });
    }
    ngOnInit() {
    }

    onSubmit(form){
        this.ue.AddUser(form).subscribe(res => {
            LoginComponent.setUserID(res.text().trim());
            window.location.href='./';
        });
    }

}