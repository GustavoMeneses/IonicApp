import { AplicativoService } from 'src/app/services/aplicativo.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-aplicativos',
  templateUrl: './aplicativos.page.html',
  styleUrls: ['./aplicativos.page.scss'],
})
export class AplicativosPage implements OnInit {

  results: Observable<any>;
  nome = '';
  json = '';

  constructor(private aplicativoService: AplicativoService) { }

  ngOnInit() {
    this.results = this.aplicativoService.getAplicativos();
  }

  RecarregarInfo(){
    this.results = this.aplicativoService.getAplicativos();
  }

  deletarAplicativo(id){
    this.aplicativoService.deletar(id).subscribe();
    this.RecarregarInfo();
  }

  CadastrarAplicativo(){
    this.json = JSON.stringify({
      nome:this.nome
    })
    //console.log(this.json);
    this.aplicativoService.cadastrar(this.json).subscribe();
    this.RecarregarInfo();
  }

}
