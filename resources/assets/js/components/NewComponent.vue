<template lang="pug">

  .base-section
    spinner-component(v-if='!items.length')

    .uk-padding(v-if='items')
      div.uk-overflow-auto
        table.uk-table.uk-table-divider.uk-table-justify.uk-table-middle.uk-margin-remove-bottom
          tbody
            tr(v-for='item in items')
              td.uk-table-shrink
                router-link.uk-link-reset(:to="getLink(item)")
                  img.uk-preserve-width.uk-margin-right(:src="item.img")
              td
                router-link.uk-link-reset.uk-margin-right.base-text-crop(:to="getLink(item)") {{ item.title_full }}
                br
                router-link.uk-link-reset.uk-margin-right(:to="getLink(item)") Глава {{ item.vol }} - {{ item.ch}}
              td.uk-width-small.uk-text-right

              td.uk-width-small.uk-text-right
                router-link.uk-link-reset.uk-margin-right(:to="getLink(item)") {{ item.date }}
              td
                Title {{ item.title_full }}

</template>

<script>
import SpinnerComponent from "./SpinnerComponent";

export default {
  name: "new-component",
  components: {
    SpinnerComponent
  },
  mounted() {
    this.$store.dispatch("getNewChapters");
  },
  computed: {
    items() {
      return this.$store.getters.getNewChapters;
    }
  },
  methods: {
    getLink(item) {
      return `/manga/${item.id}/view/${item.vol}/${item.ch}`;
    }
  }
};
</script>

<style scoped>
</style>