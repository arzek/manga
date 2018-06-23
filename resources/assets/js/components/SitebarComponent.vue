<template lang="pug">

#offcanvas-overlay.uk-offcanvas.uk-open(uk-offcanvas='mode: slide' style="display: block;")
  .uk-offcanvas-bar.uk-flex.uk-flex-column
    ul.uk-nav.uk-nav-default
      li.uk-margin-small(:class="{'uk-active': isActive('/')}")
        router-link(to='/').
          #[span.uk-margin-small-right(uk-icon="icon: table")]
          Catalog
      li.uk-margin-small(:class="{'uk-active': isActive('/new')}", v-if="type == 'Hentai'")
        router-link(to='/new').
          #[span.uk-margin-small-right(uk-icon="icon: bolt")]
          New
      li.uk-margin-small(:class="{'uk-active': isActive('/random')}")
        router-link(to='/random').
          #[span.uk-margin-small-right(uk-icon="icon: happy")]
          Random
      li.uk-margin-small(:class="{'uk-active': isActive('/history')}")
        router-link(to='/history').
          #[span.uk-margin-small-right(uk-icon="icon: history")]
          History
      li.uk-margin-small(v-if="link && type")
        a(:href='link').
          #[span.uk-margin-small-right(uk-icon="icon: star")]
          {{ type }}        
      // li.uk-nav-divider.uk-margin-medium
      // li.uk-margin-small
      //   a.base-tag(href='#') школа
      //   a.base-tag(href='#') комедия
      //   a.base-tag(href='#') веб
      li.uk-nav-divider.uk-margin-medium
      li.uk-margin-small
        span Зроблено атдуши 
        a(href='#').
          by Arzek & gotoredo
      li.uk-margin-small
        span Feedback:
        a(href='mailto:arzek2015@gmail.com').
          arzek2015@gmail.com

</template>

<script>
  export default {
    name: 'sitebar-component',
    mounted() {
      this.$store.dispatch('getConfig');
    },
    computed: {
      type() {
        return this.$store.getters.getConfigItem('type');
      },
      link() {
        return this.$store.getters.getConfigItem('link');
      }
    },
    methods: {
      isActive(route) {
        if (this.$route.path === route) {
          return true
        } else {
          return false
        }
      }
    }
  }
</script>
