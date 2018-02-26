<template lang="pug">

    .base-section
      spinner-component(v-if='!item')
      .uk-padding(uk-lightbox, v-if='item')
        div.uk-child-width-1-5.base-view(uk-grid)

          .base-view-title.uk-width-1-1.uk-h2.
           Том {{ chapter.vol }} - {{ chapter.ch }} #[span 1-{{ chapter.items.length }}]

          div(v-for="(item,index) in chapter.items")
            .uk-card.uk-card-default
              a(:data-caption="index + 1" :href="item")
                img(:src='item' alt='')
              .uk-card-body.uk-overlay.uk-overlay-default.uk-position-center.uk-padding-small.base-overlay-bottom
                .uk-link-muted.uk-card-title {{ index + 1 }}/{{ chapter.items.length }}
    


</template>

<script>
    import SpinnerComponent from "./SpinnerComponent";

    export default {
        components: {SpinnerComponent},
        name: 'manga-view-component',
        mounted() {
            if (!this.item) {
                this.$store.dispatch('getMangaById',this.$route.params.manga_id);
            }
        },
        computed: {
            item() {
                return this.$store.getters.getMangaById(this.$route.params.manga_id);
            },
            chapter() {
                return this.item.chapters.find( (item,i) => {
                    return i == this.$route.params.tom_id;
                });
            }
        }

    }
</script>