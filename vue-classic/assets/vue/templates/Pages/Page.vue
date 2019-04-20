<template>
	<Layout>
		<PageBanner v-if="thumbnail" :banner="thumbnail" :title="title" />
		<section v-html="content" class="mt-8 font-sans font-medium leading-normal page-content text-base px-4 xl:px-0"></section>
	</Layout>
</template>

<script>
import PageBanner from '@/components/PageBanner.vue';

export default {
  name: 'Page',
  components: {
    PageBanner,
  },
  props: {
    title: String,
    content: String,
    thumbnail: Object,
  },
};
</script>

<style scoped>
.page-content >>> p {
  margin-bottom: 1rem;
}
.title {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
</style>
