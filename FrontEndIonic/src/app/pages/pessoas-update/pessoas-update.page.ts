import { PessoaService } from 'src/app/services/pessoa.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-pessoas-update',
  templateUrl: './pessoas-update.page.html',
  styleUrls: ['./pessoas-update.page.scss'],
})
export class PessoasUpdatePage implements OnInit {

  information = null;
  nome = '';
  cpf = '';
  rg = '';
  nascimento = '';
  id = '';
  json = '';

  constructor(private activatedRoute: ActivatedRoute, private pessoaService: PessoaService) { }

  ngOnInit() {
    this.id = this.activatedRoute.snapshot.paramMap.get('id');

    this.pessoaService.getInfo(this.id).subscribe( result => {
      this.information = result;
      this.nome = this.information.nome;
      this.cpf = this.information.cpf;
      this.rg = this.information.rg;
      this.nascimento = this.information.dt_nascimento;
    });
  }

  AtualizarPessoa(){
    this.json = JSON.stringify({
      nome:this.nome,
      cpf:this.cpf,
      dt_nascimento:this.nascimento,
      rg:this.rg
    })
    //console.log(this.json);
    this.pessoaService.atualizar(this.json,this.id).subscribe();
    this.activatedRoute.navigate(['/', 'pessoas']);
  }

}
