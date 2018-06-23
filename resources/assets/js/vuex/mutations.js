export default {
  setDataCatalog(state, { data }) {
    state.data.catalog = data;
  },
  setFilterItem: (state, { field, data }) => {
    state.filters[field] = data;
  },
  setManga: (state, { data }) => {
    state.data.manga.push(data);
  },
  setDataHistory(state, { data }) {
    state.data.history = data.reverse();
  },
  clearFilter(state) {
    state.filters = {
      order: {
        name: 'Популярность',
        value: 'popular'
      },
      type: null,
      tags: null
    }
  },
  setNewChapters(state, { data }) {
    state.data.newChapters = data;
  },
  setCurrentManga(state, { data }) {
    state.data.currentManga = data;
  },
  setConfig(state, { data }) {
    state.config.type = data.type;
    state.config.link = data.link;
  }
}