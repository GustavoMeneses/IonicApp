import { AcessoService } from 'src/app/services/acesso.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-acessos',
  templateUrl: './acessos.page.html',
  styleUrls: ['./acessos.page.scss'],
})
export class AcessosPage implements OnInit {

  results_usuario: Observable<any>;
  results_aplicativo: Observable<any>;
  id_usuario = '';
  id_aplicativo = '';
  json = '';

  constructor(private acessoService: AcessoService) { }

  ngOnInit() {

    this.results_usuario = this.acessoService.getUsuarios();
    this.results_aplicativo = this.acessoService.getAplicativos();
  }

  CadastrarAcesso(){
    this.json = JSON.stringify({
      id_usuario:this.id_usuario,
      id_aplicativo:this.id_aplicativo
    })

    this.acessoService.cadastrar(this.json).subscribe();
  }

}
