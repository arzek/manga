import { LocalStore } from "../db";

export default {
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
            LocalStore.addManga(response.data.data);
        });
    }
}