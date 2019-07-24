import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { map } from 'rxjs/operators';

const httpOptions = {
  headers: new HttpHeaders({
    'Content-Type':  'application/json'
  })
};

@Injectable({
  providedIn: 'root'
})
export class UsuarioService {

  url = 'http://localhost:8000/api/';

  constructor(private http: HttpClient) { }

  getPessoas(): Observable<any>{
    return this.http.get(`${this.url}pessoas`)
    .pipe(
      map(results_pessoa => {
        //console.log('RAW: ', results);
        return results_pessoa;
      })
    );
  }

  getPerfis(): Observable<any>{
    return this.http.get(`${this.url}perfis`)
    .pipe(
      map(results_perfil => {
        //console.log('RAW: ', results);
        return results_perfil;
      })
    );
  }

  cadastrar(json){
    //console.log(json);
    return this.http.post(`${this.url}usuario`,json,httpOptions);
  }
}
