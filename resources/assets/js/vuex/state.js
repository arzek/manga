export default {
    config: {
      type: '',
      link: ''
    },
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
        manga: [],
        currentManga: null,
        history: [],
        newChapters: []
    }
};