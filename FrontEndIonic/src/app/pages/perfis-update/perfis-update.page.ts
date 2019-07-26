import { PerfilService } from 'src/app/services/perfil.service';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';

@Component({
  selector: 'app-perfis-update',
  templateUrl: './perfis-update.page.html',
  styleUrls: ['./perfis-update.page.scss'],
})
export class PerfisUpdatePage implements OnInit {

  information = null;
  perfil = '';
  id = '';
  json = '';

  constructor(private router: Router, private activatedRoute: ActivatedRoute, private perfilService: PerfilService) { }

  ngOnInit() {
    this.id = this.activatedRoute.snapshot.paramMap.get('id');

    this.perfilService.getInfo(this.id).subscribe( result => {
      this.information = result;
      this.perfil = this.information.perfil;
    });
  }

  AtualizarPerfil(){
    this.json = JSON.stringify({
      perfil:this.perfil
    })
    //console.log(this.json);
    this.perfilService.atualizar(this.json,this.id).subscribe();
    this.router.navigate(['/', 'perfis']);
  }

}
