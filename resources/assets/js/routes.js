import CatalogComponent from './components/CatalogComponent'
import MangaComponent from './components/MangaComponent'
import MangaViewComponent from './components/MangaViewComponent'
import HistoryComponent from './components/HistoryComponent'
import NewComponent from './components/NewComponent'
import RandomComponent from  './components/RandomComponent'

const routes = [
	{path: '/', component: CatalogComponent},
	{path: '/history', component: HistoryComponent},
	{path: '/new', component: NewComponent},
	{path: '/random', component: RandomComponent},
	{path: '/manga/:manga_id', component: MangaComponent},
	{path: '/manga/:manga_id/view', component: MangaViewComponent},
	{path: '/manga/:manga_id/view/:tom_id', component: MangaViewComponent}
];

export default routes;