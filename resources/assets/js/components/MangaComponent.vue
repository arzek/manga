<template lang="pug">

    .base-section

        spinner-component(v-if='!item')

        .uk-padding(v-if='item')
            section.uk-comment.uk-margin-large-bottom
                header.uk-comment-header.uk-grid-medium.uk-flex-stretch(uk-grid)
                    .uk-width-auto
                        img.uk-comment-avatar(:src="item.img" alt="")
                    .uk-width-expand
                        h1.uk-comment-title
                            a.uk-link-reset.uk-h1(href="#") {{ item.title_full }}
                        ul.uk-comment-meta.uk-subnav.uk-subnav-divider
                            li {{ item.type }}
                            li {{ item.count_ch }} главы
                            li + {{ item.rating }}
                        .uk-comment-body
                            p
                                span.uk-badge(v-for="tag in tags") {{ tag }}
                            p {{ item.short_story }}
            div
                table.uk-table.uk-table-divider.uk-margin-remove-bottom
                    thead
                        tr
                            th Название
                            th.uk-table-shrink
                                span.uk-table-shrink-wrap.
                                    Загружено
                    tbody
                        tr(v-for='chapter in item.chapters')
                            td
                                router-link.uk-link-reset(:to='to(chapter.vol, chapter.ch)') Том {{ chapter.vol }} - {{ chapter.ch }}
                            td.uk-table-shrink
                                span.uk-table-shrink-wrap.
                                    {{ chapter.date }}

</template>

<script>
	import SpinnerComponent from "./SpinnerComponent";
	import {LocalStore} from '../LocalStore';
	import scrollIntoView from 'scroll-into-view';

	export default {
		components: {SpinnerComponent},
		name: 'manga-component',
		mounted() {
			if (document.documentElement.scrollTop) {
				scrollIntoView(document.getElementById('nav'), {
					align: {
						top: 0
					}
				});
			}
      this.$store.dispatch("getManga", this.$route.params.mangaId);
		},
		computed: {
			item() {
				return this.$store.getters.getMangaById(this.$route.params.mangaId);
			},
			tags() {
				return this.item.tags.split(', ');
			},
			countChapters() {
				return this.item.chapters.length;
			}
		},
		methods: {
			to(tom, chapter) {
				return `/manga/${this.$route.params.mangaId}/view/${tom}/${chapter}`;
			}
		}
	}
</script>

<style lang="scss">
    .uk-table-shrink-wrap {
        width: 100px;
        display: block;
        text-align: right;
    }
</style>