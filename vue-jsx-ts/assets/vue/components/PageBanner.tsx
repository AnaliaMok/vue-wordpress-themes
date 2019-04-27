import Placeholders from '@/helpers/constants';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia } from '@/wordpressTypes.d.ts';

@Component
export default class PageBanner extends Vue {
  @Prop() banner!: WPMedia;
  @Prop() readonly title!: string;
  @Prop() readonly subheading!: string;

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

  render(h:any , context: any) {
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
        <div class="page-banner__content inline-block absolute z-10 text-grey-lightest text-center px-4 lg:px-0 w-5/6 lg:w-3/5">
          <h1 class="font-display text-xl md:text-4xl mb-2">{title}</h1>
          <p v-show={subheading} domPropsInnerHTML={subheading} />
        </div>
      </div>
    );
  }
}
