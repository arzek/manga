<template lang="pug">

    .base-section
      spinner-component(v-if='!item')
      .uk-padding(uk-lightbox, v-if='item')
        div.uk-child-width-1-5.base-view(uk-grid)(v-for='chapter in chapters') 
	
          .base-view-title.uk-width-1-1.uk-h2. 
           Том {{ chapter.vol }} - {{ chapter.ch }} #[span 1-{{ chapter.items.length }}]

          div(v-for="(item,index) in chapter.items")
            .uk-card.uk-card-default.view-item
              a(:data-caption="index + 1 + '/' + chapter.items.length" :href="item")
                img(:src='item' alt='')
              .uk-card-body.uk-overlay.uk-overlay-default.uk-position-center.uk-padding-small.base-overlay-bottom
                .uk-link-muted.uk-card-title {{ index + 1 }}/{{ chapter.items.length }}
		
        

</template>

<script>
    import SpinnerComponent from "./SpinnerComponent";
		import { react } from 'babel-types';

    export default {
        components: {SpinnerComponent},
				name: 'manga-view-component',
				data() {
					return {
            count: 1,
            is_load: true
					}
				},
        mounted() {
          if (document.scrollHeight === document.offsetHeight) {
            this.count++;
          }
						//document.addEventListener('my_event', event => this.load_items(event));
						window.addEventListener('scroll', event => this.scroll(event))

            if (!this.item) {
                this.$store.dispatch('getMangaById',this.$route.params.manga_id);
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
								return [this.item.chapters.find( (item,i) => {
                    return i == this.$route.params.tom_id;
                })];
							} else if (this.count > 1 ) {
								let data = [];
								for (let i = 0; i < this.count; i++) {
									let res = this.item.chapters.find( (item,j) => {
                    return j == (Number(this.$route.params.tom_id) - i);
                	});
									data.push(res);
                }
                this.is_load = true;
								return data;
							}
						}
        },
        methods: {
            load_items(event) {
              if (this.is_load) {
                this.count++;
              } 
						},
						scroll(event) {
							if (document.documentElement.scrollTop + window.innerHeight >= document.body.scrollHeight){
    						this.load_items();
							}
						}
        }

    }
</script>

<style lang="scss">

.base-view {
  .view-item{
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