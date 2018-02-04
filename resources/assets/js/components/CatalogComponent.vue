<template lang="pug">

  .base-section

    div.spinner-container(v-if='!items.length')
      div(uk-spinner='ratio: 2')

    section.uk-padding(v-if='items.length', uk-scrollspy='target: > article; cls:uk-animation-fade; delay: 100')
      .uk-grid-medium.uk-child-width-1-3.uk-text-left(uk-grid)
        manga-item-component(v-for="item in items", :key="item.id", :item="item")

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
