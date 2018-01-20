<template lang="pug">
    #offcanvas-overlay(uk-offcanvas="mode: reveal; overlay: true")
        .uk-offcanvas-bar.uk-flex.uk-flex-column
            button.uk-offcanvas-close(type="button" uk-close="")
            ul.uk-nav.uk-nav-primary.uk-nav-center.uk-margin-auto-vertical
                li
                    a(href="#") Catalog
                li
                    a(href="#") New
                li
                    a(href="#") Random
                li
                    a(href="#") Tag
                li
                    a(href="#") History

</template>

<script>
    export default {
        name: "sitebar-component"
    }
</script>

<style scoped>

</style>