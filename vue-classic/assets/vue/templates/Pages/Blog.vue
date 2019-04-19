<template>
	<Layout>
		<section class="mb-12">
			<h1 class="mb-4 text-grey-darkest text-center font-display">Welcome to Our Blog!</h1>
			<img :src="banner.url" :alt="banner.alt" class="block w-4/5 mx-auto">
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

<style>
</style>
