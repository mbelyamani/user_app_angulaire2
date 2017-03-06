import { Injectable } from '@angular/core';

let users = [
  { email: 'user1@domain.com', password: "password1" },
  { email: 'user2@domain.com', password: "password2" },
  { email: 'user3@domain.com', password: "password3" },
  { email: 'user4@domain.com', password: "password4" }
];

@Injectable()
export class UsersService {
  constructor() { }

  getUsers(){
    //return new Promise(resolve => resolve(users)).then(onFulfilled )  ;
    return new Promise(resolve => resolve(users));
  }

  logMe(){
    console.log('I m logging you here');
  }

}
