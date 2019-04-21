<template>
	<Page :title="title" :thumbnail="thumbnail">
		Front Page
	</Page>
</template>

<script>
import Page from '@/templates/Pages/Page.vue';

export default {
  components: {
    Page,
  },
  props: {
    title: String,
    thumbnail: Object,
    latestposts: Array,
  },
  mounted() {
    console.log(this.latestposts);
  },
};
</script>

