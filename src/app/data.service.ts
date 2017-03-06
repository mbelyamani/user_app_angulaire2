import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Headers, RequestOptions } from '@angular/http';

import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';

@Injectable()
export class DataService {

  constructor(private http:Http) { }

  fetchUsers() {
    return this.http.get('http://192.168.56.1:888/UserLoginNG/UsersList.php')
      .map(response => response.json());
  }

  AuthenticateUser (email: string, pwd: string) {
    let headers = new Headers({'Content-type': 'application/x-www-form-urlencoded'});
    let options = new RequestOptions({ headers: headers });
    return this.http.post('http://192.168.56.1:888/UserLoginNG/AuthenticateUser.php',
                        JSON.stringify({ "email": email,"password": pwd}),
                        options)
                 .map(response => response.json());
  }

  AddUser (firstName:string, lastName:string, phoneNumber:string, email: string, pwd: string) {
    console.log("Add User Calll");
    let headers = new Headers({'Content-type': 'application/x-www-form-urlencoded'});
    let options = new RequestOptions({ headers: headers });
    return this.http.post('http://192.168.56.1:888/UserLoginNG/AddUser.php',
                        JSON.stringify({ "firstName": firstName,"lastName": lastName,
                                          "phoneNumber": phoneNumber,
                                          "email": email,"password": pwd}),
                        options)
                 .map(response => response.json());
  }


}
