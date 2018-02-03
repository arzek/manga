<template lang="pug">

  section.base-section.uk-padding(uk-scrollspy='target: > article; cls:uk-animation-fade; delay: 100')
    manga-item-component
    manga-item-component
    manga-item-component
    manga-item-component
    manga-item-component
    manga-item-component

</template>

<script>
  import MangaItemComponent from './MangaItemComponent';

  export default {
    components: {MangaItemComponent},
    name: 'main-component'
  }
</script>
