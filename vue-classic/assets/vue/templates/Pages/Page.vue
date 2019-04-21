<template>
	<Layout>
		<PageBanner v-if="thumbnail" :banner="thumbnail" :title="title" />
		<section v-html="content" class="mt-8 font-sans font-medium leading-normal page-content text-base px-4 xl:px-0"></section>
    <slot/>
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
