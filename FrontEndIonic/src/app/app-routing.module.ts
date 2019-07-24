import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', loadChildren: './home/home.module#HomePageModule' },
  { path: 'pessoas', loadChildren: './pages/pessoas/pessoas.module#PessoasPageModule' },
  { path: 'perfis', loadChildren: './pages/perfis/perfis.module#PerfisPageModule' },
  { path: 'aplicativos', loadChildren: './pages/aplicativos/aplicativos.module#AplicativosPageModule' },
  { path: 'usuarios', loadChildren: './pages/usuarios/usuarios.module#UsuariosPageModule' },
  { path: 'acessos', loadChildren: './pages/acessos/acessos.module#AcessosPageModule' },
  { path: 'pessoas/:id', loadChildren: './pages/pessoas-update/pessoas-update.module#PessoasUpdatePageModule' },
  { path: 'perfis/:id', loadChildren: './pages/perfis-update/perfis-update.module#PerfisUpdatePageModule' },
  { path: 'aplicativos/:id', loadChildren: './pages/aplicativos-update/aplicativos-update.module#AplicativosUpdatePageModule' },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
