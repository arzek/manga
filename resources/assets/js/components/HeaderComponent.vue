<template lang="pug">

div(uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky")
  nav.uk-navbar-container.uk-margin-left.uk-margin-right(uk-navbar)
    .uk-navbar-left
      ul.uk-navbar-nav
        li.uk-margin-right
          a(href='#') #[span(uk-icon='icon: settings; ratio: 1.5')]
          .uk-width-xlarge(uk-dropdown="pos: top-left")
            div.uk-dropdown-grid.uk-child-width-1-2(uk-grid)
              div
                ul.uk-nav.uk-dropdown-nav
                  li.uk-nav-header Date
                  li.uk-active
                    select.uk-select
                      option 123
                      option 321
                  li.uk-nav-header Popularity
                  li.uk-active
                    select.uk-select
                      option etc.
                      option etc.
              div
                ul.uk-nav.uk-dropdown-nav
                  li.uk-nav-header Name
                  li.uk-active
                    select.uk-select
                      option A
                      option B
                  li.uk-nav-header Something
                  li.uk-active
                    select.uk-select
                      option etc.
                      option etc.
        li.uk-margin-right
          .uk-navbar-item
            .uk-inline
              select.uk-select.uk-form-width-small
                option Date
                option Date
        li.uk-margin-right
          .uk-navbar-item
            .uk-inline
              select.uk-select.uk-form-width-small
                option Popularity
                option Popularity
        li.uk-margin-right
          .uk-navbar-item
            .uk-inline
              select.uk-select.uk-form-width-small
                option Name
                option Name
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