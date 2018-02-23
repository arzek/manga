import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);


export default new Vuex.Store({
    state: {
        filters: {
            order: {
                name: 'Популярность',
                value: 'popular'
            },
            type: null,
            tags: null
        },
        data: {
            catalog: [],
            manga: []
        }
    },
    getters: {
        getCatalogData(state) {
            return state.data.catalog;
        },
        getFilterItem: (state) => (field) => {
            return state.filters[field];
        },
        getMangaById: (state) => (id) => {
            return state.data.manga.find( item => {
                return item.manga.id == id;
            });
        }
    },
    mutations: {
        setDataCatalog(state,{ data }) {
            state.data.catalog = data;
        },
        setFilterItem: (state,{ field, data } ) => {
            state.filters[field] = data;
        },
        setManga: (state,{ data }) => {
            state.data.manga.push(data);
        }
    },
    actions: {
        getCatalogDataFromApi({commit,state}) {
            let data = {};
            commit('setDataCatalog',{ data: []});

            if (state.filters.order) {
                data.order = state.filters.order.value;
            }

            if (state.filters.type) {
                data.type = state.filters.type;
            }

            if (state.filters.tags) {
                data.tags = state.filters.tags;
            }

            axios.post('/catalog',data).then( (response) => {
                commit('setDataCatalog',{ data: response.data});
            });


        },
        getMangaById({commit},id) {
            axios.post('/manga',{ id: id }).then( (response) => {
                commit('setManga',{ data: response.data.data });
            });
        }
    }
});


// export default new Vuex.Store({
//     state: {
//         data: [],
//         selected: []
//     },
//     getters: {
//         getData(state) {
//             return state.data;
//         },
//         getSelected(state) {
//             return state.selected;
//         }
//     },
//     mutations: {
//         setData(state,{ items }){
//             state.data = items;
//         },
//         setSelected(state,{ selected }){
//             state.selected = selected;
//         },
//     },
//     actions: {
//         setData({commit},data){
//             commit('setData',{ items: data});
//         },
//         getDataFromApi({commit}) {
//
//             axios.get('/users',{
//                 headers: {
//                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//                 }
//             }).then(function (response) {
//                 commit('setData',{ items: response.data});
//             }).catch(function (error) {
//                 console.log(error);
//             });
//         },
//         setSelected({commit},selected){
//             commit('setSelected',{ selected: selected});
//         }
//     }
// })