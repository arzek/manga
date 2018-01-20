<template>
    <nav class="uk-navbar-container uk-light" uk-navbar>
        <div class="uk-navbar-left">
            <ul class="uk-navbar-nav">
                <li>
                    <a class="uk-text-muted">
                        <span uk-icon="icon: heart"></span>
                    </a>
                </li>
                <li>
                    <a href="#">По популярности <span uk-icon="icon: triangle-down"></span></a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li class="uk-active"><a href="#">По популярности</a></li>
                            <li><a href="#">По алфавиту</a></li>
                            <li><a href="#">Новая манга</a></li>
                            <li><a href="#">Количество Глав</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <div class="uk-navbar-item">
                <form action="javascript:void(0)">
                    <div class="uk-inline">
                        <a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: search"></a>
                        <input class="uk-input" type="text">
                    </div>
                </form>
            </div>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a class="uk-text-muted" uk-toggle="target: #offcanvas-overlay">
                        <span uk-icon="icon: menu"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
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