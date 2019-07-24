import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  { path: '', redirectTo: 'home', pathMatch: 'full' },
  { path: 'home', loadChildren: './home/home.module#HomePageModule' },
  { path: 'pessoas', loadChildren: './pages/pessoas/pessoas.module#PessoasPageModule' },
  { path: 'perfis', loadChildren: './pages/perfis/perfis.module#PerfisPageModule' },
  { path: 'aplicativos', loadChildren: './pages/aplicativos/aplicativos.module#AplicativosPageModule' },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
