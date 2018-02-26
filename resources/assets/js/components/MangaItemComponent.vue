<template lang="pug">

div
  article.uk-comment.uk-margin-large-bottom
    header.uk-comment-header.uk-grid-medium.uk-flex-stretch(uk-grid)
      .uk-width-1-1
        router-link(:to="link")
          img.uk-comment-avatar(:src="item.img" alt="")
      .uk-width-1-1
        h1.uk-h3
          router-link.uk-link-reset(:to="link", :title='item.title_full') {{ item.title_full}}
        ul.uk-comment-meta.uk-subnav.uk-subnav-divider
          li {{ item.type }}
          li {{ item.count_ch }} главы
          li +{{ item.rating }}
          <!--li 12 дней назад-->
        .uk-comment-body
          p
            span.uk-badge(v-for="tag in tags") {{ tag }}


</template>

<script>
    export default {
    name: 'manga-item-component',
    props: ['item'],
    computed: {
        tags() {
            return this.item.tags.split(', ');
        },
        link() {
            return `/manga/${this.item.id}`;
        }
    }
  }
</script>