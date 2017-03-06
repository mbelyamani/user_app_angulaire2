import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { FormBuilder, Validators } from '@angular/forms';
import { FormGroup, FormControl } from '@angular/forms';
import { DataService } from '../data.service';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  status:any;

  public signupForm = this.fb.group({
     firstName: ["", Validators.required],
     lastName: ["", Validators.required],
     phoneNumber: ["", Validators.required],
     inputEmail: ["", Validators.required],
     inputPassword: ["", Validators.required]
   });

  constructor(private dataService:DataService, public fb: FormBuilder,
              private router: Router, private route: ActivatedRoute) { }

  ngOnInit() { }

  onSubmit(event){
    let firstName = this.signupForm.value['firstName'];
    let lastName = this.signupForm.value['lastName'];
    let phoneNumber = this.signupForm.value['phoneNumber'];
    let email = this.signupForm.value['inputEmail'];
    let pwd = this.signupForm.value['inputPassword'];
    this.dataService.AddUser (firstName, lastName, phoneNumber, email, pwd).subscribe(
                                      (res) => {  this.status = res;
                                                  console.log(this.status);
                                                  let jsonFormat = JSON.parse(this.status);
                                                  if (jsonFormat.status == 'Success')
                                                      this.router.navigate(['/signin', { relativeTo: this.route }]);
                                                }
                                    );
  }


}
