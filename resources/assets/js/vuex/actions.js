import { LocalStore } from "../LocalStore";

export default {
  getCatalogDataFromApi({ commit, state }) {
    let data = {};
    commit('setDataCatalog', { data: [] });

    if (state.filters.order) {
      data.order = state.filters.order.value;
    }

    if (state.filters.type) {
      data.type = state.filters.type;
    }

    if (state.filters.tags) {
      data.tags = state.filters.tags;
    }

    axios.post('/catalog', data).then((response) => {
      commit('setDataCatalog', { data: response.data });
    });


  },
  getManga({ commit, state }, id) {
    let res = state.data.manga.find(item => {
      return item.id == id;
    });
    if (res) {
      commit('setCurrentManga', { data: res });
    } else {
      axios.post('/manga', { id: id }).then((response) => {
        commit('setManga', { data: response.data.data });
        commit('setCurrentManga', { data: response.data.data });
        try {
          LocalStore.addManga(response.data.data);
        } catch (err) {
          console.log(err)
        }

      });
    }
  },
  getMangaById({ commit }, id) {
    axios.post('/manga', { id: id }).then((response) => {
      commit('setManga', { data: response.data.data });
      try {
        LocalStore.addManga(response.data.data);
      } catch (err) {
        console.log(err)
      }

    });
  },
  getNewChapters({ commit }) {
    axios.get('/new').then((response) => {
      commit('setNewChapters', { data: response.data.data })
    });
  }
}