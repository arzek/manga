<template lang="pug">

#offcanvas-overlay.uk-offcanvas.uk-open(uk-offcanvas='mode: slide' style="display: block;")
  .uk-offcanvas-bar.uk-flex.uk-flex-column
    ul.uk-nav.uk-nav-default
      li.uk-active.uk-margin-small
        a(href='#').
          #[span.uk-margin-small-right(uk-icon="icon: table")]
          Catalog
      li.uk-margin-small
        a(href='#').
          #[span.uk-margin-small-right(uk-icon="icon: bolt")]
          New
      li.uk-margin-small
        a(href='#').
          #[span.uk-margin-small-right(uk-icon="icon: happy")]
          Random
      li.uk-margin-small
        a(href='#').
          #[span.uk-margin-small-right(uk-icon="icon: history")]
          History
      li.uk-nav-divider.uk-margin-medium
      li.uk-margin-small
        a.base-tag(href='#') школа
        a.base-tag(href='#') комедия
        a.base-tag(href='#') веб
      li.uk-nav-divider.uk-margin-medium
      li.uk-margin-small
        a(href='#').
          Зроблено атдуши #[br] by Arzek & gotoredo

</template>

<script>
  export default {
    name: 'sitebar-component'
  }
</script>
