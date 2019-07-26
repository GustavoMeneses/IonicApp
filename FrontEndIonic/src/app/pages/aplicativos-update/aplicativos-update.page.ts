import { AplicativoService } from 'src/app/services/aplicativo.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';

@Component({
  selector: 'app-aplicativos-update',
  templateUrl: './aplicativos-update.page.html',
  styleUrls: ['./aplicativos-update.page.scss'],
})
export class AplicativosUpdatePage implements OnInit {

  information = null;
  nome = '';
  id = '';
  json = '';

  constructor(private router: Router, private activatedRoute: ActivatedRoute, private aplicativoService: AplicativoService) { }

  ngOnInit() {
    this.id = this.activatedRoute.snapshot.paramMap.get('id');

    this.aplicativoService.getInfo(this.id).subscribe( result => {
      this.information = result;
      this.nome = this.information.nome;
    });
  }

  AtualizarAplicativo(){
    this.json = JSON.stringify({
      nome:this.nome
    })
    //console.log(this.json);
    this.aplicativoService.atualizar(this.json,this.id).subscribe();
    this.router.navigate(['/', 'aplicativos']);
  }

}
