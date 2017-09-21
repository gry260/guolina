import {Component} from '@angular/core';
import {FormGroup, FormControl, Validators, FormBuilder} from '@angular/forms';
import {UserService} from "../services/user";

@Component({
  selector: 'profile',
  templateUrl: 'app/Users/Profile.php'
})


export class ProfileComponent {

  ProfileForm: FormGroup;
  FirstName: string;
  LastName: string;
  Email: string;
  Gender: string;
  UserService;

  constructor(u: UserService) {
    this.UserService = u;
  }

  ngOnInit() {

  }


  onSubmit(form){


  }


}