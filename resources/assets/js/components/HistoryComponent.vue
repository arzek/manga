<template lang="pug">

    .base-section
        spinner-component(v-if='!items.length')

        section.uk-padding(v-if='items.length', uk-scrollspy='target: > article; cls:uk-animation-fade; delay: 100')
            .uk-grid-medium.uk-child-width-1-4.uk-text-left(uk-grid)
                manga-item-component(v-for="item in items", :key="item.id + '_' + item.date", :item="item")

</template>

<script>
	import MangaItemComponent from './MangaItemComponent';
	import SpinnerComponent from "./SpinnerComponent";
	import {LocalStore} from "../LocalStore";
	import scrollIntoView from 'scroll-into-view';

	export default {
		components: {
			SpinnerComponent,
			MangaItemComponent
		},
		name: 'history-component',
		mounted() {
			if (document.documentElement.scrollTop) {
				scrollIntoView(document.getElementById('nav'), {
					align: {
						top: 0
					}
				});
			}
			LocalStore.getAll((data) => {
				this.$store.commit('setDataHistory', {data: data});
			})
		},
		computed: {
			items() {
				return this.$store.getters.getHistoryData;
			}
		}
	}
</script>

<style lang="scss">
    .uk-subnav > * {
        padding-left: .5rem;
    }

    .uk-subnav {
        margin-left: -.5rem;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before {
        margin-right: .5rem;
    }
</style>
