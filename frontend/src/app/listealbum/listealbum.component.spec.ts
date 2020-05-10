import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListealbumComponent } from './listealbum.component';


describe('ListealbumComponent', () => {
  let component: ListealbumComponent;
  let fixture: ComponentFixture<ListealbumComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListealbumComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListealbumComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
