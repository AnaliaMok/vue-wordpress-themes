<template functional>
	<div class="img-wrapper">
		<img :src="props.banner.url" :alt="props.banner.alt">
		<div class="overlay pin"></div>
    <div class="content">
      <h1>{{ props.title }}</h1>
      <p v-if="props.subheading" v-html="props.subheading"></p>
    </div>
	</div>
</template>

<script lang="ts">
import Placeholders from '@/helpers/constants';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia } from '@/wordpressTypes.d.ts';

@Component
export default class PageBanner extends Vue {
  @Prop(Object) banner!: WPMedia;
  @Prop(String) readonly title!: string;
  @Prop(String) readonly subheading!: string;

  defaultBannerImage: WPMedia = {
    url: Placeholders.banner,
    alt: 'Blog Header',
  };

  get bannerImage() {
    if (this.banner === null) {
      return this.defaultBannerImage;
    }

    return {
      url: this.banner.url || this.defaultBannerImage.url,
      alt:
        this.banner.alt && this.banner.alt.length > 0
          ? this.banner.alt
          : this.defaultBannerImage.alt,
    };
  }
}
</script>

<style lang="scss" scoped>
@import '~/base/_variables.scss';

.img-wrapper {
  position: relative;
  margin: 0 auto;

  @media (min-width: $md) {
    width: 80%;
  }

  img {
    display: block;
  }
}

.overlay {
  position: absolute;
  background-color: $gray-900;
  opacity: 0.5;
}

.content {
  display: inline-block;
  position: absolute;
  padding: 0 1rem;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
  z-index: 10;
  width: calc(5 / 6 * 100%);
  color: $gray-100;
  text-align: center;

  @media (min-width: $lg) {
    padding: 0;
    width: calc(3 / 5 * 100%);
  }

  h1 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;

    @media (min-width: $lg) {
      font-size: 2.25rem;
    }
  }

  & >>> p a {
    color: $white;
  }
}
</style>
