<template>
	<section class="px-4 md:px-0 md:w-4/5 mx-auto flex">
		<div v-for="item in items" :key="item.id">
			<img :src="getThumbnailUrl(item)" :alt="getThumbnailAlt(item)" class="w-full">
			<strong class="block mt-2 px-4">{{ getFormattedDate(item.date) }}</strong>
			<a :href="item.slug"><h3 class="mt-2 px-4">{{ item.title }}</h3></a>
		</div>
	</section>
</template>

<script>
import { DateMixin } from '@/mixins/DateMixin.js';

export default {
  mixins: [DateMixin],
  props: {
    items: Array,
  },
  data() {
    return {
      defaultThumbnail: {
        url:
          window.location.origin +
          '/wp-content/themes/vue-classic/assets/img/placeholder.png',
        alt: 'Blog Thumbnail',
      },
    };
  },
  methods: {
    getThumbnailUrl(item) {
      if (item.thumbnail) {
        return item.thumbnail.url;
      } else {
        return this.defaultThumbnail.url;
      }
    },
    getThumbnailAlt(item) {
      if (item.thumbnail) {
        return item.thumbnail.alt;
      } else {
        return this.defaultThumbnail.alt;
      }
    },
  },
};
</script>

<style scoped>
section {
  flex-wrap: wrap;
}
section > div {
  flex: 1 1 100%;
  margin-bottom: 2rem;
}

@media screen and (min-width: 768px) {
  section > div {
    flex: 1 1 50%;
    margin-bottom: 1rem;
  }
}

@media screen and (min-width: 992px) {
  section {
    flex-wrap: nowrap;
  }
  section > div {
    flex: 1 1 25%;
    margin-bottom: 0;
  }
}
</style>
