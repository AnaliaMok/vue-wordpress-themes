<template>
	<Layout>
		<section class="md:w-4/5 mx-auto px-4 py-8 md:p-0">
			<h2>{{ title }}</h2>
			<div v-html="content" class="leading-normal"></div>
			<hr class="border-grey-dark mt-4 mb-8">
		</section>
		<Pager :resourceType="postType" :params="params" />
	</Layout>
</template>

<script>
import Pager from '@/components/Pager.vue';

export default {
  components: {
    Pager,
  },
  props: {
    title: String,
    content: String,
    params: String,
    postType: {
      type: String,
      default: 'posts',
    },
  },
};
</script>

<style scoped>
hr {
  border-bottom-width: 1px;
}
</style>
