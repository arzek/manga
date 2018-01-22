<template lang="pug">

nav.uk-navbar-container.uk-margin-left(uk-navbar)
  .uk-navbar-item.uk-logo(href="#")
    span(uk-icon='icon: heart; ratio: 2')
  .uk-navbar-left
    ul.uk-navbar-nav
      li.uk-margin-right
        a(href='#') サイクリング肛門 #[span(uk-icon="icon: triangle-down")]
          .uk-navbar-dropdown.uk-padding-small(uk-dropdown="mode: click; pos: top-right")
            ul.uk-nav.uk-navbar-dropdown-nav
              li.uk-active
                a(href='#') リング肛門
              li
                a(href='#') イグ肛門
              li
                a(href='#') サイクリ
              li
                a(href='#') グ肛門
  .uk-navbar-right
    .uk-navbar-item
      form(action='javascript:void(0)')
        .uk-inline
          a.uk-form-icon.uk-form-icon-flip(href='#' uk-icon='icon: search')
          input.uk-input(type="text")

</template>

<script>

  import SitebarComponent from './SitebarComponent';

  export default {
    components: {SitebarComponent},
    name: 'header-component'
  }

</script>

<style scoped>

</style>