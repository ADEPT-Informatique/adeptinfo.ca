import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LanComponent } from './lan.component';

const routes: Routes = [
	{
		path: '',
		component: LanComponent,
	},
	{ path: '**', redirectTo: '', pathMatch: 'full' },
];

@NgModule({
	imports: [RouterModule.forChild(routes)],
	exports: [RouterModule],
})
export class LanRoutingModule {}
