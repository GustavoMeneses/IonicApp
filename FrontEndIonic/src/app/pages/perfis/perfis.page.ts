import { PerfilService } from 'src/app/services/perfil.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-perfis',
  templateUrl: './perfis.page.html',
  styleUrls: ['./perfis.page.scss'],
})
export class PerfisPage implements OnInit {

  results: Observable<any>;
  perfil = '';
  json = '';

  constructor(private perfilService: PerfilService) { }

  ngOnInit() {
    this.results = this.perfilService.getPerfis();
  }

  RecarregarInfo(){
    this.results = this.perfilService.getPerfis();
  }

  deletarPerfil(id){
    this.perfilService.deletar(id).subscribe();
    this.RecarregarInfo();
  }

  CadastrarPerfil(){
    this.json = JSON.stringify({
      perfil:this.perfil
    })
    //console.log(this.json);
    this.perfilService.cadastrar(this.json).subscribe();
    this.RecarregarInfo();
  }

}
