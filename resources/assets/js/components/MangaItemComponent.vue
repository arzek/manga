<template lang="pug">

article.uk-comment.uk-margin-large-bottom
  header.uk-comment-header.uk-grid-medium.uk-flex-stretch(uk-grid)
    .uk-width-auto
      img.uk-comment-avatar(:src="item.img" width="200" height="200" alt="")
    .uk-width-expand
      h1.uk-comment-title
        a.uk-link-reset.uk-h1(href="#") {{ item.title_full}}
      ul.uk-comment-meta.uk-subnav.uk-subnav-divider
        li {{ item.type }}
        li {{ item.count_ch }} главы
        li +{{ item.rating }}
        <!--li 12 дней назад-->
      .uk-comment-body
        p
          span.uk-badge(v-for="tag in tags") {{ tag }}

        p.
          Данная манхва о молодом парне Сон Чхегу у которого умер отец, и ушла мать...
          оставив его с братом и сестрой на произвол судьбы. Вскоре он поступает в школу где
          намерен получить достойное образование, и в дальнейшем устроится на хорошую работу.
          С этого момента и начинается его приключение в "Школе отвязных".

</template>

<script>
  export default {
    name: 'manga-item-component',
    props: ['item'],
    computed: {
        tags() {
            return this.item.tags.split(', ');
        }
    }
  }
</script>