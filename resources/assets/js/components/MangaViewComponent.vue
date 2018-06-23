<template lang="pug">

    .base-section
        spinner-component(v-if='!item')
        .uk-padding(uk-lightbox, v-if='item')
            chapter-component(v-for='(chapter,index) in chapters', :key='chapter.ch', :index='index', :chapter='chapter')

        .uk-padding.uk-text-center(v-show='item && isLastChapter')
            button.uk-button.uk-button-primary(@click='loadItems') Cледующая глава

</template>

<script>
import SpinnerComponent from "./SpinnerComponent";
import ChapterComponent from "./ChapterComponent";
import scrollIntoView from "scroll-into-view";

export default {
  components: { SpinnerComponent, "chapter-component": ChapterComponent },
  name: "manga-view-component",
  data() {
    return {
      count: 1,
      nextCh: null,
      isLoad: true,
      chapters: []
    };
  },
  mounted() {
    if (document.documentElement.scrollTop) {
      scrollIntoView(document.getElementById("nav"), {
        align: {
          top: 0
        }
      });
    }
    this.$store.dispatch("getManga", this.$route.params.mangaId);
    this.$store.subscribe((mutation, state) => {
      if (mutation.type === 'setCurrentManga') {
        this.setFirstItem();
      }
    });
    if (this.item) {
      this.setFirstItem();
    }
  },
  computed: {
    item() {
      return this.$store.getters.getCurrentManga;
    },
    tomId() {
      return Number(this.$route.params.tomId);
    },
    chId() {
      return Number(this.$route.params.chapterId);
    },
    countAllChapters() {
      if (this.item) {
        return this.item.chapters[0].ch;
      }
    },
    isLastChapter() {
      if (this.item.chapters[this.nextCh]) {
        return true;
      } else {
        return false;
      }
    }
  },
  methods: {
    loadItems() {
      this.chapters.push(this.item.chapters[this.nextCh]);
      this.nextCh--;
    },
    setFirstItem() {
      if (!this.$route.params.tomId && this.$route.params.chapterId === '0') {
        this.chapters.push( this.item.chapters[0]); 
      }

      let length = this.item.chapters.length;
      if (length) {
        for (let i = 0; i < this.item.chapters.length; i++) {
         let item = this.item.chapters[i];
         if (item.vol == this.tomId && item.ch == this.chId) {
           this.chapters.push(item);
           this.nextCh = i - 1;
           break;
         }
      }
      }
      
    }
  }
};
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