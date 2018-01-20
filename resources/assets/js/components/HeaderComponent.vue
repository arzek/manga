<template lang="pug">
    nav.uk-navbar-container.uk-light(uk-navbar="")
        .uk-navbar-left
            ul.uk-navbar-nav
                li
                    a.uk-text-muted
                        span(uk-icon="icon: heart")
                li
                    a(href="#")
                        | По популярности
                        span(uk-icon="icon: triangle-down")
                    .uk-navbar-dropdown
                        ul.uk-nav.uk-navbar-dropdown-nav
                            li.uk-active
                                a(href="#") По популярности
                            li
                                a(href="#") По алфавиту
                            li
                                a(href="#") Новая манга
                            li
                                a(href="#") Количество Глав
            .uk-navbar-item
                form(action="javascript:void(0)")
                    .uk-inline
                        a.uk-form-icon.uk-form-icon-flip(href="#" uk-icon="icon: search")
                        input.uk-input(type="text")
        .uk-navbar-right
            ul.uk-navbar-nav
                li
                    a.uk-text-muted(uk-toggle="target: #offcanvas-overlay")
                        span(uk-icon="icon: menu")

</template>

<script>
    import SitebarComponent from "./SitebarComponent";

    export default {
        components: {SitebarComponent},
        name: "header-component"
    }
</script>

<style scoped>

</style>