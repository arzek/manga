export default {
	setDataCatalog(state, {data}) {
		state.data.catalog = data;
	},
	setFilterItem: (state, {field, data}) => {
		state.filters[field] = data;
	},
	setManga: (state, {data}) => {
		state.data.manga.push(data);
	},
	setDataHistory(state, {data}) {
		state.data.history = data.reverse();
	}
}