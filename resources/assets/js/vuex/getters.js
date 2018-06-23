export default {
  getCatalogData(state) {
    return state.data.catalog;
  },
  getFilterItem: (state) => (field) => {
    return state.filters[field];
  },
  getMangaById: (state) => (id) => {
    return state.data.manga.find(item => {
      return item.id == id;
    });
  },
  getHistoryData(state) {
    return state.data.history;
  },
  getNewChapters(state) {
    return state.data.newChapters;
  },
  getCurrentManga(state) {
    return state.data.currentManga;
  },
  getConfigItem: (state) => (field) => {
    return state.config[field];
  }
};