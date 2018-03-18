<template lang="pug">

    .base-section

      spinner-component(v-if='!item')

      .uk-padding(v-if='item')
        section.uk-comment.uk-margin-large-bottom
          header.uk-comment-header.uk-grid-medium.uk-flex-stretch(uk-grid)
            .uk-width-auto
              img.uk-comment-avatar(:src="item.manga.img" alt="")
            .uk-width-expand
              h1.uk-comment-title
                a.uk-link-reset.uk-h1(href="#") {{ item.manga.title_full }}
              ul.uk-comment-meta.uk-subnav.uk-subnav-divider
                li {{ item.manga.type }}
                li {{ item.manga.count_ch }} главы
                li + {{ item.manga.rating }}
              .uk-comment-body
                p
                  span.uk-badge(v-for="tag in tags") {{ tag }}
                p {{ item.manga.short_story }}
        div
          table.uk-table.uk-table-divider.uk-margin-remove-bottom
            thead
              tr
                th Название
                th.uk-table-shrink 
                  span.uk-table-shrink-wrap. 
                    Загружено
            tbody
              tr(v-for='(chapter,index) in item.chapters')
                td
                  router-link.uk-link-reset(:to='to(index)') Том {{ chapter.vol }} - {{ chapter.ch }}
                td.uk-table-shrink 
                  span.uk-table-shrink-wrap. 
                    {{ chapter.date }}

          <!--ul.uk-pagination.uk-flex-center.uk-margin-->
            <!--li-->
              <!--a(href='#')-->
                <!--span(uk-icon="icon: chevron-left")-->
            <!--li-->
              <!--a(href='#') 1-->
            <!--li-->
              <!--a(href='#') 2-->
            <!--li.uk-active-->
              <!--a(href='#') 3-->
            <!--li.uk-disabled-->
              <!--span ...-->
            <!--li-->
              <!--a(href='#') 40-->
            <!--li-->
              <!--a(href='#')-->
                <!--span(uk-icon="icon: chevron-right")-->

</template>

<script>
  import SpinnerComponent from "./SpinnerComponent";
  import { LocalStore } from '../LocalStore';

  export default {
      components: {SpinnerComponent},
      name: 'manga-component',
      mounted() {
          if (!this.item) {
              this.$store.dispatch('getMangaById',this.$route.params.manga_id);
          } else {
            LocalStore.addManga(this.item);
          }
      },
      computed: {
          item() {
              return this.$store.getters.getMangaById(this.$route.params.manga_id);
          },
          tags() {
              return this.item.manga.tags.split(', ');
          },
      },
      methods: {
        to(index) {
          return '/manga/' + this.$route.params.manga_id + '/view/' + index;
        }
      }
  }
</script>

<style lang="scss">
  .uk-table-shrink-wrap {
    width: 100px;
    display: block;
    text-align: right;
  }
</style>