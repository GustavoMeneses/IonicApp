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
export class PerfilService {

  url = 'http://localhost:8000/api/';

  constructor(private http: HttpClient) { }

  getPerfis(): Observable<any>{
    return this.http.get(`${this.url}perfis`)
    .pipe(
      map(results => {
        //console.log('RAW: ', results);
        return results;
      })
    );
  }

  deletar(id){
    //console.log(httpOptions);
    return this.http.delete(`${this.url}perfil/${id}`,httpOptions);
  }

  cadastrar(json){
    //console.log(json);
    return this.http.post(`${this.url}perfil`,json,httpOptions);
  }

  getInfo(id){
    return this.http.get(`${this.url}perfil/${id}`,httpOptions);
  }

  atualizar(json,id){
    return this.http.put(`${this.url}perfil/${id}`,json,httpOptions);
  }
}
