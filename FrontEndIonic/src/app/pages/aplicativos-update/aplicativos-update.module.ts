import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { Routes, RouterModule } from '@angular/router';

import { IonicModule } from '@ionic/angular';

import { AplicativosUpdatePage } from './aplicativos-update.page';

const routes: Routes = [
  {
    path: '',
    component: AplicativosUpdatePage
  }
];

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    RouterModule.forChild(routes)
  ],
  declarations: [AplicativosUpdatePage]
})
export class AplicativosUpdatePageModule {}
