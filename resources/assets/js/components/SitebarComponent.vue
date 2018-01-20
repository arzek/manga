<template>
    <div id="offcanvas-overlay" uk-offcanvas="mode: reveal; overlay: true">
        <div class="uk-offcanvas-bar uk-flex uk-flex-column">

            <button class="uk-offcanvas-close" type="button" uk-close></button>

            <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
                <li><a href="#">Catalog</a></li>
                <li><a href="#">New</a></li>
                <li><a href="#">Random</a></li>
                <li><a href="#">Tag</a></li>
                <li><a href="#">History</a></li>
            </ul>

        </div>
    </div>
</template>

<script>
    export default {
        name: "sitebar-component"
    }
</script>

<style scoped>

</style>