<template lang="pug">

div.fixed-nav(id='nav')

  nav.uk-navbar-container.uk-margin-left.uk-margin-right(uk-navbar, v-show='$route.path === "/"')
    .uk-navbar-left
      ul.uk-navbar-nav
        li.uk-margin-right
          a(href="#") {{ order.name }} #[span.uk-margin-small-left(uk-icon="icon: chevron-down")]
          div(uk-dropdown="pos: top-left")
            div.uk-dropdown-grid(uk-grid)
              div
                ul.uk-nav.uk-dropdown-nav
                  li(v-for="item in order_list")
                    a(@click.self.prevent="setOrder(item)") {{ item.name }}

    .uk-navbar-right
      .uk-navbar-item
        form.uk-inline(@submit.prevent="search()")
            a.uk-form-icon.uk-form-icon-flip.uk-icon(@click="search()")
                svg(width='20', height='20', viewbox='0 0 20 20', xmlns='http://www.w3.org/2000/svg', ratio='1')
                    circle(fill='none', stroke='#000', stroke-width='1.1', cx='9', cy='9', r='7')
                    path(fill='none', stroke='#000', stroke-width='1.1', d='M14,14 L18,18 L14,14 Z')
            input.uk-input(type='search', v-model='textSearch')
</template>

<script>
  import SitebarComponent from './SitebarComponent';
  export default {
    components: {SitebarComponent},
    name: 'header-component',
    data() {
        return {
            textSearch: '',
            orderItems: [
                {
                    name: 'Популярность',
                    value: 'popular'
                },
                {
                    name: 'Дата',
                    value: 'newest'
                },
                {
                    name: 'Имя',
                    value: 'catalog'
                },
                {
                    name: 'Главы',
                    value: 'sortch'
                }

            ]
        }
    },
    computed: {
        order() {
            return this.$store.getters.getFilterItem('order');
        },
        order_list() {
            return this.orderItems.filter( item => {
               return this.order.value !== item.value;
            });
        }
    },
    methods: {
        setOrder(data) {
            this.$store.commit('setFilterItem',{
                field: 'order',
                data: data
            });
            this.$store.dispatch('getCatalogDataFromApi');
        },
        search() {
            if (this.textSearch) {
                this.$store.commit('setFilterItem',{
                    field: 'type',
                    data: 'search'
                });
                this.$store.commit('setFilterItem',{
                    field: 'tags',
                    data: this.textSearch
                });
            } else {
                this.$store.commit('setFilterItem',{
                    field: 'type',
                    data: null
                });
                this.$store.commit('setFilterItem',{
                    field: 'tags',
                    data: null
                });
            }
            this.$store.dispatch('getCatalogDataFromApi');
            this.textSearch = '';
        }
    },
    watch: {

    }
  }

</script>

<style scoped>

</style>