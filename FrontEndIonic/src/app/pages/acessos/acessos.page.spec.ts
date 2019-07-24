import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AcessosPage } from './acessos.page';

describe('AcessosPage', () => {
  let component: AcessosPage;
  let fixture: ComponentFixture<AcessosPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AcessosPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AcessosPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
