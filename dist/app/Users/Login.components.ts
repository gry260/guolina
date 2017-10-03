import {Component} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {Http, Response} from '@angular/http';
import {Injectable, ViewChild} from '@angular/core';
import {UserService} from "../services/user";

@Component({
    selector: 'login',
    templateUrl: 'app/Users/Login.php'
})


export class LoginComponent
{
    private username: string;
    private password: string;
    e;
    ue;
    static UserID: number;
    msg: false;


    constructor(ue: UserService)
    {
        this.ue = ue;

    }

    ngOnInit() {
        this.e = new FormGroup({
            username: new FormControl('guest'),
            password: new FormControl('rena19891022'),
        });
    }
    onSubmit(obj)
    {
        this.ue.Authenticate(obj).subscribe(res => {
           if(typeof(res.text().trim()) == 'string' && res.text() && res.text() !== 'false'){
              if(this.isJson(res.text())){
                  var json = res.json();
                  localStorage.setItem('login', JSON.stringify(json));
                  LoginComponent.UserID = json.id;
                  window.location.href='./';
              }
              this.msg = false;
           }
           else{
               this.msg = true;
           }
        });
    }


    isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    static getUserID()
    {
        return LoginComponent.UserID;
    }

    static setUserID(user_id)
    {
        localStorage.setItem('login',  JSON.stringify({id: user_id}));
    }


}