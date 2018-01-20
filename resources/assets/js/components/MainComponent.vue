<template>
    <div>
        <header-component></header-component>

        <router-view></router-view>

        <sitebar-component></sitebar-component>
    </div>
</template>

<script>
    import HeaderComponent from  './HeaderComponent';
    import SitebarComponent from  './SitebarComponent';

    export default {
        name: "main-component",
        components: {
            'header-component': HeaderComponent,
            'sitebar-component': SitebarComponent
        }
    }
</script>

<style scoped>

</style>