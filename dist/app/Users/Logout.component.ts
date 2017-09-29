import {Component} from '@angular/core';
import {FormGroup, FormControl} from '@angular/forms';
import {UserService} from "../services/user";

@Component({
    selector: 'logout',
    templateUrl: './Logout.php'
})
export class LogoutComponent {
    ue: any;
    constructor(ue: UserService){
        this.ue = ue;
    }
    ngOnInit() {
    }

    onLogOut(){
        this.ue.LogOut().subscribe(res => {
            localStorage.clear();
            window.location.href='./';
        });
    }

}