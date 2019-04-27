<template>
	<Layout>
		<article>
			<PageBanner :banner="featuredMedia" :title="title" :subheading="bannerCaption" />
			<div class="px-4 lg:px-0 md:w-4/5 mx-auto mt-8" v-html="content"></div>
		</article>
	</Layout>
</template>

<script lang="ts">
import PageBanner from '@/components/PageBanner.vue';
import Placeholders from '@/helpers/constants';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia, WPPost, WPAuthor } from '@/wordpressTypes.d.ts';

@Component({
  components: {
    PageBanner,
  },
})
export default class Post extends Vue {
  @Prop(String) readonly title!: string;
  @Prop(String) readonly content!: string;
  @Prop(String) readonly date!: string;
  @Prop(Object) readonly thumbnail!: WPMedia;
  @Prop({ default: { name: 'Unknown', link: window.location.origin } })
  readonly author!: WPAuthor;

  /**
   * Compute post thumbnail image.
   *
   * Uses banner preset placeholder image if no post thumbnail has been supplied.
   */
  get featuredMedia(): WPMedia {
    const defaultUrl = Placeholders.banner;

    let url = this.thumbnail ? this.thumbnail.url : '';
    let alt = this.thumbnail ? this.thumbnail.alt : this.title;

    return {
      url: url || defaultUrl,
      alt,
    };
  }

  /**
   * Compute subheading property for PageBanner
   *
   * @return string - Formatted PageBanner subheading
   */
  get bannerCaption(): string {
    return `Published on ${this.date} by <a href='${this.author.link}'>${this
      .author.name || 'Unknown'}</a>`;
  }
}
</script>
