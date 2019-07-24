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
export class AplicativoService {

  url = 'http://localhost:8000/api/';

  constructor(private http: HttpClient) { }

  getAplicativos(): Observable<any>{
    return this.http.get(`${this.url}aplicativos`)
    .pipe(
      map(results => {
        //console.log('RAW: ', results);
        return results;
      })
    );
  }

  deletar(id){
    //console.log(httpOptions);
    return this.http.delete(`${this.url}aplicativo/${id}`,httpOptions);
  }

  cadastrar(json){
    //console.log(json);
    return this.http.post(`${this.url}aplicativo`,json,httpOptions);
  }
}
