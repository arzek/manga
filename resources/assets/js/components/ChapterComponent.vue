<template lang="pug">

  div.uk-child-width-1-5.base-view(uk-grid)
    .base-view-title.uk-width-1-1.uk-h2. 
      {{ title(chapter.vol, chapter.ch) }} #[span 1-{{ chapter.items.length }}]

    div(v-for="(item,index) in chapter.items")
      .uk-card.uk-card-default.view-item
        a(:data-caption="index + 1 + '/' + chapter.items.length", :href="item")
          img(:src='item' alt='')
        .uk-card-body.uk-overlay.uk-overlay-default.uk-position-center.uk-padding-small.base-overlay-bottom
          .uk-link-muted.uk-card-title {{ index + 1 }}/{{ chapter.items.length }}
          
</template>

<script>
export default {
  name: 'chapter-component',
  props: ['chapter','index'],
  methods: {
    title(vol, ch) {
      if (vol == '-', ch == '0') {
        return `Глава - ${ ch }`
      } else {
        return `Том ${ vol } - ${ ch }`
      }
    }
  }
}
</script>
