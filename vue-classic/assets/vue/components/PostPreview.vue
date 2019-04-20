<template>
	<article class="flex justify-center items-center flex-col lg:flex-row block lg:w-4/5 mx-auto mb-8" v-cloak>
    <figure class="flex-grow md:w-4/5 lg:w-2/5">
      <img :src="featuredMedia.url" :alt="featuredMedia.alt" class="max-w-full">
    </figure>
    <div class="post__content p-8 flex-grow md:w-4/5 lg:w-3/5">
      <h2 class="font-display text-2xl mt-0 mb-2">
        <a :href="item.link || '#'" class="no-underline text-indigo-darker hover:underline">
          {{ item.title.rendered }}
        </a>
      </h2>
      <h3 class="font-sans text-base mt-0 mb-2">{{ formattedDate }}</h3>
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
          '/wp-content/themes/vue-classic/assets/img/placeholder.png',
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
          let url = '';

          if (data[0].media_details.sizes['blog-post']) {
            url = data[0].media_details.sizes['blog-post'].source_url;
          } else {
            url = data[0].media_details.sizes['medium_large'].source_url;
          }

          this.featuredMedia = {
            url,
            alt: data[0].alt_text || this.item.title.rendered,
          };
        } else {
          this.featuredMedia['alt'] = this.item.title.rendered;
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
