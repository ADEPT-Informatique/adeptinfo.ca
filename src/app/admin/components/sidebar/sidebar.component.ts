import { Component, OnInit } from '@angular/core';
import {
  faCertificate,
  faCogs,
  faExternalLinkAlt,
  faGamepad,
  faIdBadge,
  faShoppingBasket,
  faTachometerAlt,
  faTshirt,
  faUsers,
} from '@fortawesome/free-solid-svg-icons';
import { Page } from 'src/app/shared/models';

@Component({
  selector: 'admin-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.scss'],
})
export class SidebarComponent {
  navbarHover = false;
  pages: Page[] = [
    {
      icon: faTachometerAlt,
      name: 'Accueil',
      path: '/admin',
    },
    {
      icon: faShoppingBasket,
      name: 'Epicerie',
      path: '/admin/fridge',
    },
    {
      icon: faUsers,
      name: 'Liste Utilisateurs',
      path: '/admin/users',
    },
    {
      icon: faTshirt,
      name: 'Gestion hoodies',
      path: '/admin/hoodies',
    },
    {
      icon: faCertificate,
      name: 'Membres de confiance',
      path: '/admin/mdc',
    },
    {
      icon: faGamepad,
      name: 'Comité du LAN',
      path: '/admin/lan',
    },
    {
      icon: faIdBadge,
      name: 'Administrateurs',
      path: '/admin/admins',
    },
    {
      icon: faCogs,
      name: 'Paramètres du site',
      path: '/admin/options',
    },
    {
      icon: faExternalLinkAlt,
      name: 'Gestion du LAN',
      path: 'https://lan.adeptinfo.ca/admin',
    },
  ];
  constructor() {
    console.log(this.getPath());
  }

  getPath() {
    return window.location.pathname;
  }
}
