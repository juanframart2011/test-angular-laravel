import { Component, OnInit } from '@angular/core';
import { User } from 'src/app/interface/User';
import { HttpClient } from "@angular/common/http";

@Component({
  selector: 'app-prueba',
  templateUrl: './prueba.component.html',
  styleUrls: ['./prueba.component.scss']
})
export class PruebaComponent implements OnInit {
	
	userData:any = [];
	users:User[] = [];

	constructor(
		private httpClient: HttpClient
	){}
	
	ngOnInit(): void{

		this.httpClient.get("assets/data.json").subscribe(data =>{
	    	
	    	this.userData = data;
	    	for( var u = 0; u < this.userData.length; u++ ){

	    		this.users.push( this.userData[u] );
	    	}
	    	this._showEmailInConsole( this.users );
	    });
		//console.log( "Users => ", this.users );
	}

	_showEmailInConsole( emails ){

		for( var u = 0; u < emails.length; u++ ){

    		console.info( "El primer email es: " + emails[u].email );
    	}
	}
}