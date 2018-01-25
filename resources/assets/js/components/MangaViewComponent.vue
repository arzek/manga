<template lang="pug">

  section.base-section.uk-padding
    div.uk-child-width-1-5.base-view(uk-grid uk-lightbox)


      // mix
      mixin item(title)
        div
          .uk-card.uk-card-default
            a(data-caption="1" href="http://img.mangachan.me/manga/-9new/s/1516440886_sweet_home_s01_ch00rsc/sweet_home_ch00_01.png")
              img(src='http://img3.mangachan.me/manga/a/1343381550_at-the-park/atthepark_p05.png' alt='')
            .uk-card-body.uk-overlay.uk-overlay-default.uk-position-center.uk-padding-small.base-overlay-bottom
              a.uk-link-muted.uk-card-title= title

      .base-view-title.uk-width-1-1.uk-h2.
        У нас в селі такої хуйні не було #[span 1-30]

      +item('40/40')
      +item('39/40')
      +item('38/40')
      +item('37/40')
      +item('33/40')
      +item('2/40')
      +item('1/40')

    div.uk-child-width-1-5.base-view(uk-grid)

      .base-view-title.uk-width-1-1.uk-h2.
        ІСХС БРАТАН #[span 13-30]

      +item('40/40')
      +item('39/40')
      +item('38/40')
      +item('37/40')
      +item('36/40')

    div.uk-child-width-1-5.base-view(uk-grid)

      .base-view-title.uk-width-1-1.uk-h2.
        Ану #[span 13-30]

      +item('9/40')
      +item('8/40')
      +item('7/40')
      +item('6/40')
      +item('5/40')
      +item('4/40')
      +item('3/40')
      +item('2/40')
      +item('1/40')

</template>

<script>
  export default {
    name: 'manga-view-component'
  }
</script>
