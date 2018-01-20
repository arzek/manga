<template>
    <div class="uk-offcanvas-content">
        <section class="base-section uk-padding">
            <div class="uk-container-small">
                <div class="uk-child-width-1-1@m" uk-grid uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 100">
                    <div>
                        <manga-item-component></manga-item-component>
                    </div>
                    <div>
                        <manga-item-component></manga-item-component>
                    </div>
                    <div>
                        <manga-item-component></manga-item-component>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import MangaItemComponent from "./MangaItemComponent";

    export default {
        components: {MangaItemComponent},
        name: "main-component"
    }
</script>

<style scoped>

</style>