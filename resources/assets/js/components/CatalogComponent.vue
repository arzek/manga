<template lang="pug">

  .base-section
    spinner-component(v-if='!items.length')

    section.uk-padding(v-if='items.length', uk-scrollspy='target: > article; cls:uk-animation-fade; delay: 100')
      .uk-grid-medium.uk-text-left(uk-grid)
        manga-item-component(v-for="item in items", :key="item.id", :item="item")

</template>

<script>
  import MangaItemComponent from './MangaItemComponent';
  import SpinnerComponent from "./SpinnerComponent";

  export default {
    components: {
        SpinnerComponent,
        MangaItemComponent},
    name: 'catalog-component',
    mounted() {
      this.$store.commit('clearFilter');
      this.$store.dispatch('getCatalogDataFromApi');
    },
    computed: {
        items() {
            return this.$store.getters.getCatalogData;
        }
    }
  }
</script>

<style lang="scss">
  .uk-subnav > * {
    padding-left: .5rem;
  }

  .uk-subnav {
    margin-left: -.5rem;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
  }

  .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before {
    margin-right: .5rem;
  }
</style>
