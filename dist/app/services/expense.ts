import {Http, Response, Headers, RequestOptions, HttpModule} from "@angular/http";
import {Injectable } from '@angular/core';
import 'rxjs/add/operator/map';

import { Observable } from 'rxjs/Observable';

// Observable class extensions
import 'rxjs/add/observable/of';
import 'rxjs/add/observable/throw';

// Observable operators
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/filter';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/switchMap';


@Injectable()
export class ExpenseService {
  http: Http;
  private text;
  private data;
  private b;

  constructor(private h: Http) {
    this.http = h;
  }

  AddCategory(user_id, name)
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    let body = JSON.stringify({'a': 'addcategorytype', name: name, user_id: user_id});
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }
  DeleteCategory(id)
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    let body = JSON.stringify({'deleteusercategoryid':id});
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }

  DeleteSubCategory(id)
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    let body = JSON.stringify({'deleteusersubcategoryid':id});
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);

  }

  GetCategoryKeyWords(cid) : Observable<any>
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    let body = JSON.stringify({'cid':cid});
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }

  SearchReports(parameters): Observable<any>
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    let body = JSON.stringify(parameters);
    return this.http.post('app/Search/SearchSubmit.php', body, options);
  }

  GetSubCategory(category_id, type, user_id) {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    var parameters = {
      a:'getsubcategory',
      category_id: category_id,
      type: type,
      user_id: user_id
    }
    let body = JSON.stringify(parameters);
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }

  AddExpense(obj) {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    obj.a = 'addexpense';
    let body = JSON.stringify(obj);
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }

  UpdateExpense(obj){
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    obj.a = 'updateexpense';
    let body = JSON.stringify(obj);
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }

  RemoveExpense(obj)
  {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    obj.a = 'removeexpenseid';
    let body = JSON.stringify(obj);
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);

    //return this.http.get('app/ExpenseType/ControllerActions.php?a=removeexpenseid&id='+id).map((res: Response) => res.text());
  }

  AddExpenseSubCategoryType(data, user_id) {
    let headers = new Headers({ 'Content-Type': 'application/json' });
    let options = new RequestOptions({ headers: headers });
    data.a = 'addsubcategorytype';
    data.user_id = user_id;
    let body = JSON.stringify(data);
    return this.http.post('app/ExpenseType/ControllerActions.php', body, options);
  }
}
