<template lang="pug">

    .base-section
        spinner-component(v-if='!item')
        .uk-padding(uk-lightbox, v-if='item')
            chapter-component(v-for='(chapter,index) in chapters',:key='chapter.ch' :index='index' :chapter='chapter')

        p(@click='load_items') Ще !!!

</template>

<script>
    import SpinnerComponent from "./SpinnerComponent";
    import ChapterComponent from "./ChapterComponent";

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
                    return [this.item.chapters.find((item, i) => {
                        return i === this.$route.params.tom_id;
                    })];
                } else if (this.count > 1) {
                    let data = [];
                    for (let i = 0; i < this.count; i++) {
                        let res = this.item.chapters.find((item, j) => {
                            return j === (Number(this.$route.params.tom_id) - i);
                        });
                        data.push(res);
                    }
                    this.is_load = true;
                    return data;
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