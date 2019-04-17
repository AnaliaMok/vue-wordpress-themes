<template>
	<Layout>
		<h2 class="text-center text-indigo-darker font-display text-4xl mt-4 md:mt-0 mb-4">{{ title }}</h2>
		<figure class="img-wrapper mb-4 mx-auto md:w-3/4" v-if="thumbnail">
			<img :src="thumbnail.url" :alt="thumbnail.alt || title">
		</figure>
		<section v-html="content" class="font-sans font-medium leading-normal page-content text-base px-4 xl:px-0"></section>
	</Layout>
</template>

<script>
export default {
  name: 'Page',
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
</style>
