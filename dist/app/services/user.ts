import { Http, Response } from '@angular/http';
import { Injectable } from '@angular/core';
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
        console.log(firstname);
    }

}