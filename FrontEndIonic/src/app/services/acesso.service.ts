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
export class AcessoService {

  url = 'http://localhost:8000/api/';

  constructor(private http: HttpClient) { }

  getUsuarios(): Observable<any>{
    return this.http.get(`${this.url}usuarios`)
    .pipe(
      map(results_usuario => {
        //console.log('RAW: ', results);
        return results_usuario;
      })
    );
  }

  getAplicativos(): Observable<any>{
    return this.http.get(`${this.url}aplicativos`)
    .pipe(
      map(results_aplicativo => {
        //console.log('RAW: ', results);
        return results_aplicativo;
      })
    );
  }

  cadastrar(json){
    //console.log(json);
    return this.http.post(`${this.url}acesso`,json,httpOptions);
  }
}
