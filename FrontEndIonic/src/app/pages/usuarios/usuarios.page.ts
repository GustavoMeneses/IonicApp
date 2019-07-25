import { UsuarioService } from 'src/app/services/usuario.service';
import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-usuarios',
  templateUrl: './usuarios.page.html',
  styleUrls: ['./usuarios.page.scss'],
})
export class UsuariosPage implements OnInit {

  results_pessoa: Observable<any>;
  results_perfil: Observable<any>;
  results: Observable<any>;
  id_pessoa = '';
  id_perfil = '';
  json = '';

  constructor(private usuarioService: UsuarioService) { }

  ngOnInit() {

    this.results_pessoa = this.usuarioService.getPessoas();
    this.results_perfil = this.usuarioService.getPerfis();
    this.RecarregarInfo();
  }

  RecarregarInfo(){
    this.results = this.usuarioService.getUsuarios();
  }

  CadastrarUsuario(){
    this.json = JSON.stringify({
      id_pessoa:this.id_pessoa,
      id_perfil:this.id_perfil
    })

    this.usuarioService.cadastrar(this.json).subscribe();
    this.RecarregarInfo();
  }

  deletarUsuario(id){
    this.usuarioService.deletar(id).subscribe();
    this.RecarregarInfo();
  }

}
