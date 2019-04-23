<template>
	<Page :title="title" :thumbnail="thumbnail">
		<h1 class="px-4 md:px-0 md:w-4/5 mx-auto">Our Latest Posts</h1>
		<PostsCTA :items="latestposts" />
	</Page>
</template>

<script>
import Page from '@/templates/Pages/Page.vue';
import PostsCTA from '@/components/PostsCTA.vue';

export default {
  components: {
    Page,
    PostsCTA,
  },
  props: {
    title: String,
    thumbnail: Object,
    latestposts: Array,
  },
};
</script>

