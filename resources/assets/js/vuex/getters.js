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
	}
};