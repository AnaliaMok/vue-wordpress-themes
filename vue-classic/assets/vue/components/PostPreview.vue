<template>
	<article v-cloak>
		<img :src="featuredMedia.url" :alt="featuredMedia.alt">
		<h2 class="font-display text-2xl">{{ item.title.rendered }}</h2>
		<div v-html="item.excerpt.rendered" class="font-sans leading-normal"></div>
	</article>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      featuredMedia: {
        url: 'https://via.placeholder.com/768x512.png',
        alt: 'Blog Thumbnail',
      },
    };
  },
  mounted() {
    if (this.item.featured_media === 0) {
      return;
    }

    const resourceUrl = `${
      window.location.origin
    }/wp-json/wp/v2/media?include[]=${this.item.featured_media}&per_page=1`;

    fetch(resourceUrl)
      .then(res => res.json())
      .then(data => {
        if (data) {
          this.featuredMedia = {
            url: data[0].media_details.sizes['blog-post'].source_url,
            alt: data[0].alt_text || this.item.title.rendered,
          };
        }
      });
  },
};
</script>

<style>
</style>
