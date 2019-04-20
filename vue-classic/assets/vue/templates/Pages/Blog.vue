<template>
	<Layout>
		<section class="mb-12">
      <PageBanner :banner="banner" title="Welcome to Our Blog!" />
		</section>
		<Pager resourceType="posts"/>
	</Layout>
</template>

<script>
import Pager from '@/components/Pager.vue';
import PageBanner from '@/components/PageBanner.vue';

export default {
  components: {
    Pager,
    PageBanner,
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
