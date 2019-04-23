<script>
import { Placeholders } from '@/helpers/constants.js';

export default {
  functional: true,
  props: {
    banner: Object,
    title: String,
    subheading: String,
  },
  data() {
    return {
      defaultBannerImage: {
        url: Placeholders.banner,
        alt: 'Blog Header',
      },
    };
  },
  computed: {
    bannerImage() {
      if (this.banner === null) {
        return this.defaultBannerImage;
      }

      return {
        url: this.banner.url || this.defaultBannerImage.url,
        alt:
          this.banner.alt.length > 0
            ? this.banner.alt
            : this.defaultBannerImage.alt,
      };
    },
  },
  render(h, context) {
    let { banner, title, subheading } = context.props;
    let subheadingMarkup;

    if (subheading) {
      subheadingMarkup = <p domPropsInnerHTML={subheading} />;
    } else {
      subheadingMarkup = null;
    }

    return (
      <div class="img-wrapper relative md:w-4/5 mx-auto">
        <img src={banner.url} alt={banner.alt} class="block w-full" />
        <div class="absolute pin bg-grey-darkest opacity-50" />
        <div class="content inline-block absolute z-10 text-grey-lightest text-center px-4 lg:px-0 w-5/6 lg:w-3/5">
          <h1 class="font-display text-xl md:text-4xl mb-2">{title}</h1>
          {subheadingMarkup}
        </div>
      </div>
    );
  },
};
</script>

<style scoped>
.content {
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}
.content >>> p a {
  color: #f8fafc;
}
</style>
