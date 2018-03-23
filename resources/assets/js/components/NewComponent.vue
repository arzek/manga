<template lang="pug">

  .base-section
    .uk-padding(v-if='items')
      div.uk-overflow-auto
        table.uk-table.uk-table-divider.uk-table-justify.uk-table-middle.uk-margin-remove-bottom
          tbody
            tr(v-for='item in items')
              td.uk-table-shrink
                a.uk-link-reset()
                  img.uk-preserve-width.uk-margin-right(:src="item.img")
              td
                a.uk-link-reset.uk-margin-right.base-text-crop() {{ item.title_full }}
                br
                a.uk-link-reset.uk-margin-right() Глава 1 - 6
              td.uk-width-small.uk-text-right

              td.uk-width-small.uk-text-right
                a.uk-link-reset.uk-margin-right() {{ item.date }}
              td
                Title {{ item.title_full }}

</template>

<script>
	export default {
		name: "new-component",
    data() {
      return {
        items: []
      }
    },
    mounted() {
      axios.get('/test').then( (response) => {
        this.items = response.data.newch_list;
      });
    }
	}
</script>

<style scoped>

</style>