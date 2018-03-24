<template lang="pug">

    .base-section
        spinner-component(v-if='!item')
        .uk-padding(uk-lightbox, v-if='item')
            chapter-component(v-for='(chapter,index) in chapters', :key='chapter.ch', :index='index', :chapter='chapter')

        .uk-padding.uk-text-center(v-show='item && isLastChapter')
            button.uk-button.uk-button-primary(@click='load_items') Cледующая глава

</template>

<script>
	import SpinnerComponent from "./SpinnerComponent";
	import ChapterComponent from "./ChapterComponent";
	import scrollIntoView from 'scroll-into-view';

	export default {
		components: {SpinnerComponent, 'chapter-component': ChapterComponent},
		name: 'manga-view-component',
		data() {
			return {
				count: 1,
				is_load: true
			}
		},
		mounted() {
			if (document.documentElement.scrollTop) {
				scrollIntoView(document.getElementById('nav'), {
					align: {
						top: 0
					}
				});
			}

			if (!this.item) {
				this.$store.dispatch('getMangaById', this.$route.params.manga_id);
			}
		},
		computed: {
			item() {
				return this.$store.getters.getMangaById(this.$route.params.manga_id);
			},
			chapters() {
				this.is_load = false;
				if (this.count === 1) {
					this.is_load = true;
					let res = this.item.chapters.find(item => {
						return item.ch === this.tomId;
					});
					return [res];
				} else if (this.count > 1) {
					let data = [];
					for (let i = 0; i < this.count; i++) {
						let res = this.item.chapters.find(item => {
							return item.ch === this.tomId + i;
						});
						data.push(res);
					}
					this.is_load = true;
					return data;
				}
			},
			tomId() {
				let tom_id = Number(this.$route.params.tom_id);
				if (tom_id) {
					return tom_id;
				} else {
					return 0;
				}
			},
			countAllChapters() {
				if (this.item) {
					return this.item.chapters[0].ch;
				}
			},
			isLastChapter() {
				let count = (this.count - 1) + this.tomId;
				if (this.countAllChapters === count) {
					return false;
				} else {
					return true;
				}
			}
		},
		methods: {
			load_items() {
				if (this.is_load) {
					this.count++;
				}
			}
		}

	}
</script>

<style lang="scss">

    .base-view {
        .view-item {
            height: 15rem;
            overflow: hidden;
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }

</style>