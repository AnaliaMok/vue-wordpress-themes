<template>
	<Layout>
		<div class="img-wrapper relative w-4/5 mx-auto mb-8">
			<img :src="thumbnail.url" :alt="thumbnail.alt" class="block w-full">
			<div class="absolute pin bg-grey-darkest opacity-50"></div>
			<h1 class="absolute text-grey-lightest text-center font-display z-10 title">{{ title }}</h1>
		</div>
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
.title {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
</style>
