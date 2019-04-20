<template>
	<Layout>
		<article>
			<PageBanner :banner="featuredMedia" :title="title" :subheading="bannerCaption" />
			<div class="px-4 lg:px-0 md:w-4/5 mx-auto mt-8" v-html="content"></div>
		</article>
	</Layout>
</template>

<script>
import PageBanner from '@/components/PageBanner.vue';

export default {
  components: {
    PageBanner,
  },
  props: {
    title: String,
    content: String,
    thumbnail: Object,
    date: String,
    author: {
      type: Object,
      default: {
        name: 'Unknown',
        link: window.location.origin,
      },
    },
  },
  computed: {
    featuredMedia() {
      const defaultUrl =
        window.location.origin +
        '/wp-content/themes/vue-classic/assets/img/placeholder.png';

      let url = this.thumbnail ? this.thumbnail.url : '';
      let alt = this.thumbnail ? this.thumbnail.alt : this.title;

      return {
        url: url || defaultUrl,
        alt,
      };
    },
    bannerCaption() {
      return `Published on ${this.date} by <a href='${this.author.link}'>${this
        .author.name || 'Unknown'}</a>`;
    },
  },
};
</script>
