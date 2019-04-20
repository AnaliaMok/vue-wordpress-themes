<template>
	<Layout>
		<section class="mb-12">
      <div class="img-wrapper relative w-4/5 mx-auto">
        <img :src="banner.url" :alt="banner.alt" class="block w-full">
        <div class="absolute pin bg-grey-darkest opacity-50"></div>
        <h1 class="absolute text-grey-lightest text-center font-display z-10 blog-title">Welcome to Our Blog!</h1>
      </div>
		</section>
		<Pager resourceType="posts"/>
	</Layout>
</template>

<script>
import Pager from '@/components/Pager.vue';

export default {
  components: {
    Pager,
  },
  props: {
    title: {
      type: String,
      default: 'Welcome to Our Blog',
    },
    thumbnail: Object,
    content: String,
  },
  data() {
    return {
      posts: [],
      bannerImage: {
        url:
          'https://via.placeholder.com/1920x1080.png?text=Replace with Blog Header',
        alt: 'Blog Header',
      },
      currentPage: 1,
    };
  },
  computed: {
    banner() {
      if (this.thumbnail === null) {
        return this.bannerImage;
      }

      return {
        url: this.thumbnail.url || this.bannerImage.url,
        alt:
          this.thumbnail.alt.length > 0
            ? this.thumbnail.alt
            : this.bannerImage.alt,
      };
    },
  },
};
</script>

<style scoped>
.blog-title {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
</style>
