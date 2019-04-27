<template>
	<section class="px-4 md:px-0 md:w-4/5 mx-auto flex">
		<div v-for="item in items" :key="item.id">
			<img :src="getThumbnailUrl(item)" :alt="getThumbnailAlt(item)" class="w-full">
			<strong class="block mt-2 px-4">{{ getFormattedDate(item.date) }}</strong>
			<a :href="item.slug"><h3 class="mt-2 px-4">{{ item.title }}</h3></a>
		</div>
	</section>
</template>

<script lang="ts">
import DateMixin from '@/mixins/DateMixin';
import Placeholders from '@/helpers/constants';
import { Component, Prop, Mixins } from 'vue-property-decorator';
import { WPMedia, WPRichText, WPPost } from '@/wordpressTypes.d.ts';

@Component
export default class PostsCTA extends Mixins(DateMixin) {
  @Prop(Array) readonly items!: Array<WPPost>;

  defaultThumbnail: WPMedia = {
    url: Placeholders.thumbnail,
    alt: 'Blog Thumbnail',
  };

  getThumbnailUrl(item: WPPost): string {
    if (item.thumbnail) {
      return item.thumbnail.url;
    } else {
      return <string>this.defaultThumbnail.url;
    }
  }

  getThumbnailAlt(item: WPPost): string {
    if (item.thumbnail) {
      return item.thumbnail.alt;
    } else {
      return <string>this.defaultThumbnail.alt;
    }
  }
}
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
