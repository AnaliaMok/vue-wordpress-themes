<template functional>
	<div class="img-wrapper relative md:w-4/5 mx-auto">
		<img :src="props.banner.url" :alt="props.banner.alt" class="block w-full">
		<div class="absolute pin bg-grey-darkest opacity-50"></div>
		<h1 class="absolute text-grey-lightest text-center font-display z-10 title">{{ props.title }}</h1>
		<p v-if="subheading" v-html="subheading"></p>
	</div>
</template>

<script>
export default {
  props: {
    banner: {
      type: Object,
      default: {
        url: 'https://via.placeholder.com/1920x1080.png',
        alt: 'Blog Header',
      },
    },
    title: String,
    subheading: String,
  },
};
</script>

<style scoped>
.title {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
</style>
