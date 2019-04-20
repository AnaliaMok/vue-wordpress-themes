<template>
	<article class="flex justify-center items-center block w-4/5 mx-auto mb-8" v-cloak>
    <figure class="flex-grow w-2/5">
      <img :src="featuredMedia.url" :alt="featuredMedia.alt" class="max-w-full">
    </figure>
    <div class="post__content p-8 flex-grow w-3/5">
      <h2 class="font-display text-2xl mb-2">
        <a :href="item.link || '#'" class="no-underline text-indigo-darker hover:underline">
          {{ item.title.rendered }}
        </a>
      </h2>
      <h3 class="font-sans text-base mb-2">{{ formattedDate }}</h3>
      <div v-html="item.excerpt.rendered" class="font-sans leading-normal"></div>
      <a :href="item.link || '#'" class="inline-block no-underline font-sans text-indigo-dark hover:underline mt-4">
        Read More
      </a>
    </div>
	</article>
</template>

<script>
import { DateMixin } from '@/mixins/DateMixin.js';

export default {
  mixins: [DateMixin],
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      featuredMedia: {
        url:
          window.location.origin +
          '/wp-content/themes/vue-classic/assets/img/placeholder.png', //'https://via.placeholder.com/768x512.png?text=Loading...',
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
        } else {
          this.featuredMedia = {
            url: 'https://via.placeholder.com/768x512.png?text=No Image',
            alt: 'No Image',
          };
        }
      });
  },
  computed: {
    formattedDate() {
      return this.getFormattedDate(this.item.date);
    },
  },
};
</script>

<style>
</style>
