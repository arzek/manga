<template lang="pug">

  section.base-section.uk-padding(uk-scrollspy='target: > article; cls:uk-animation-fade; delay: 100')
    manga-item-component(v-for="item in items" :item="item")


</template>

<script>
  import MangaItemComponent from './MangaItemComponent';

  export default {
    components: {MangaItemComponent},
    name: 'catalog-component',
    mounted() {
        this.$store.dispatch('getCatalogDataFromApi');
    },
    computed: {
        items() {
            return this.$store.getters.getCatalogData;
        }
    }
  }
</script>
