import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  homeTitle:string = "";
  greatting:number;

  constructor() { }

  ngOnInit() {
    this.homeTitle = "welcome to home page !!!";
    this.greatting = 1000;
  }

}
