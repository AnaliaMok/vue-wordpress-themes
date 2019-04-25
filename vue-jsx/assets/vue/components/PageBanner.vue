<script>
import { Placeholders } from '@/helpers/constants.js';

export default {
  name: 'PageBanner',
  functional: true,
  props: {
    banner: Object,
    title: String,
    subheading: String,
  },
  render(h, context) {
    let { banner, title, subheading } = context.props;

    const bannerProps = {
      attrs: {
        src: banner ? banner.url : Placeholders.banner,
        alt: banner ? banner.alt : 'Blog Header',
      },
    };

    return (
      <div class="img-wrapper relative md:w-4/5 mx-auto">
        <img {...bannerProps} class="block w-full" />
        <div class="absolute pin bg-grey-darkest opacity-50" />
        <div class="content inline-block absolute z-10 text-grey-lightest text-center px-4 lg:px-0 w-5/6 lg:w-3/5">
          <h1 class="font-display text-xl md:text-4xl mb-2">{title}</h1>
          <p v-show={subheading} domPropsInnerHTML={subheading} />
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
