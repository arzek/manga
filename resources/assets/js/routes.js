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
	{path: '/manga/:mangaId', component: MangaComponent},
	{path: '/manga/:mangaId/view', component: MangaViewComponent},
	{path: '/manga/:mangaId/view/:tomId/:chapterId', component: MangaViewComponent}
];

export default routes;