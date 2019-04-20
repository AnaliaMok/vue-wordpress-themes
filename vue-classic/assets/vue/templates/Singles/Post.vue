<template>
	<Layout>
		<h2>This is a post</h2>
	</Layout>
</template>

<script>
import PageBanner from '@/components/PageBanner.vue';

export default {
  components: {
    PageBanner,
  },
  props: {
    title: String,
    content: String,
  },
};
</script>
