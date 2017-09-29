import {Http, Response, Headers, RequestOptions, HttpModule} from "@angular/http";
import {Injectable } from '@angular/core';
import 'rxjs/add/operator/map';
import {Observable} from 'rxjs/Rx';


@Injectable()
export class UserService
{
    http: Http;
    constructor(private http: Http)
    {
        this.http = http;
    }



    public UpdateProfile(firstname, lastname, email, gender)
    {

    }

    public LogOut()
    {
        var obj = {};
        obj.type = 'logout';
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        let body = JSON.stringify(obj);
        return this.http.post('app/Users/UserActions.php', body, options);
    }

    public AddUser(obj)
    {
        obj.type = 'register';
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        let body = JSON.stringify(obj);
        return this.http.post('app/Users/UserActions.php', body, options);
    }


    public Authenticate(obj)
    {
        obj.type = 'login';
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        let body = JSON.stringify(obj);
        return this.http.post('app/Users/UserActions.php', body, options);
    }

}