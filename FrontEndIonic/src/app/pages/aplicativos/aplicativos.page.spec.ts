import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AplicativosPage } from './aplicativos.page';

describe('AplicativosPage', () => {
  let component: AplicativosPage;
  let fixture: ComponentFixture<AplicativosPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AplicativosPage ],
      schemas: [CUSTOM_ELEMENTS_SCHEMA],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AplicativosPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
