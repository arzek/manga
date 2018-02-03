import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);


export default new Vuex.Store({
    state: {
        filters: {
            order: 'popular',
            type: null,
            tags: null
        },
        data: {
            catalog: [],
            manga_id: [],
            manga: []
        }
    },
    getters: {
        getCatalogData(state) {
            return state.data.catalog;
        },
        getFilterItem: (state) => (field) => {
            return state.filters[field];
        }
    },
    mutations: {
        setDataCatalog(state,{ data }) {
            state.data.catalog = data;
        }
    },
    actions: {
        getCatalogDataFromApi({commit,state}) {
            let data = [];

            if (state.filters.order) {
                data.order = state.filters.order;
            }

            if (state.filters.type) {
                data.type = state.filters.type;
            }

            if (state.filters.tags) {
                data.tags = state.filters.tags;
            }

            axios.post('/catalog',data).then( (response) => {
                commit('setDataCatalog',{ data: response.data});
            })


        },
        getMangaById({commit},id) {
            axios.post('/manga',{ id: id }).then( (response) => {
                console.log(response);
                //commit('setDataCatalog',{ data: response.data});
            })
        }
    }
})


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