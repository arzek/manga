<template lang="pug">

main.uk-offcanvas-content
  header-component(v-if='$route.path === "/"')

  router-view

  sitebar-component

</template>

<script>
  import HeaderComponent from  './HeaderComponent';
  import SitebarComponent from  './SitebarComponent';

  export default {
    name: 'main-component',
    components: {
      'header-component': HeaderComponent,
      'sitebar-component': SitebarComponent
    }
  }
</script>