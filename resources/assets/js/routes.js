import CatalogComponent from './components/CatalogComponent'
import MangaComponent from './components/MangaComponent'
import MangaViewComponent from './components/MangaViewComponent'

const routes = [
    { path: '/', component: CatalogComponent },
    { path: '/manga/:manga_id', component: MangaComponent},
    { path: '/manga/:manga_id/view', component: MangaViewComponent},
    { path: '/manga/:manga_id/view/:tom_id', component: MangaViewComponent}
];

export default routes;