<template lang="pug">

div(uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky")
  nav.uk-navbar-container.uk-margin-left.uk-margin-right(uk-navbar)
    .uk-navbar-left
      ul.uk-navbar-nav
        li.uk-margin-right
          a(href="#") something #[span.uk-margin-small-left(uk-icon="icon: chevron-down")]
          div(uk-dropdown="pos: top-left")
            div.uk-dropdown-grid(uk-grid)
              div
                ul.uk-nav.uk-dropdown-nav
                  li
                    a(href="#") Date
                  li
                    a(href="#") Name
                  li
                    a(href="#") Something
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