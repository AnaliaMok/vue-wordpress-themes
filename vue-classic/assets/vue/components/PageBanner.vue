<template functional>
	<div class="img-wrapper relative md:w-4/5 mx-auto">
		<img :src="props.banner.url" :alt="props.banner.alt" class="block w-full">
		<div class="absolute pin bg-grey-darkest opacity-50"></div>
    <div class="content inline-block absolute z-10 text-grey-lightest text-center px-4 lg:px-0 w-5/6 lg:w-3/5">
      <h1 class="font-display text-xl md:text-4xl mb-2">{{ props.title }}</h1>
      <p v-if="props.subheading" v-html="props.subheading"></p>
    </div>
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
.content {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
.content >>> p a {
  color: #f8fafc;
}
</style>
