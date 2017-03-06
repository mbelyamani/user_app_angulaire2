import { Component, OnInit } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { FormGroup, FormControl } from '@angular/forms';

import { UsersService } from '../users.service';
import { DataService } from '../data.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.css']
})
export class SigninComponent implements OnInit {
  usersList = [];
  status:any;
  formData:string;


  public loginForm = this.fb.group({
     inputEmail: ["", Validators.required],
     inputPassword: ["", Validators.required]
   });

  constructor(private users:UsersService, private dataService:DataService, public fb: FormBuilder) { }

  ngOnInit() {
  //  this.inputPassword = "password6";
  //  this.inputEmail = "user6@domain.com";
    this.dataService.fetchUsers().subscribe(
      (res) => this.usersList = res
    );
  }

  onSubmit(event){
    this.formData = this.loginForm.value;
    let email = this.formData['inputEmail'];
    let pwd = this.formData['inputPassword'];
    this.dataService.AuthenticateUser (email,pwd).subscribe(
                                      (res) => {this.status = res;
                                                console.log(this.status);
                                      }
                                    );
  }


}
