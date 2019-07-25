import { PessoaService } from 'src/app/services/pessoa.service';
import { Component, OnInit } from '@angular/core';
//import { ActivatedRoute } from '@angular/router';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-pessoas',
  templateUrl: './pessoas.page.html',
  styleUrls: ['./pessoas.page.scss'],
})
export class PessoasPage implements OnInit {

  results: Observable<any>;
  nome = '';
  cpf = '';
  rg = '';
  nascimento = '';
  json = '';

  constructor(private pessoaService: PessoaService) { }

  ngOnInit() {
    this.results = this.pessoaService.getPessoas();
  }

  RecarregarInfo(){
    this.results = this.pessoaService.getPessoas();
  }

  deletarPessoa(id){
    this.pessoaService.deletar(id).subscribe();
    this.RecarregarInfo();
  }

  CadastrarPessoa(){
    this.json = JSON.stringify({
      nome:this.nome,
      cpf:this.cpf,
      dt_nascimento:this.nascimento,
      rg:this.rg
    })
    //console.log(this.json);
    this.pessoaService.cadastrar(this.json).subscribe();
    this.RecarregarInfo();
  }

}
