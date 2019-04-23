<script>
import PageBanner from '@/components/PageBanner.vue';
import { Placeholders } from '@/helpers/constants.js';

export default {
  props: {
    title: String,
    content: String,
    thumbnail: Object,
    date: String,
    author: {
      type: Object,
      default: {
        name: 'Unknown',
        link: window.location.origin,
      },
    },
  },
  computed: {
    featuredMedia() {
      const defaultUrl = Placeholders.banner;

      let url = this.thumbnail ? this.thumbnail.url : '';
      let alt = this.thumbnail ? this.thumbnail.alt : this.title;

      return {
        url: url || defaultUrl,
        alt,
      };
    },
    bannerCaption() {
      return `Published on ${this.date} by <a href='${this.author.link}'>${this
        .author.name || 'Unknown'}</a>`;
    },
  },
  render: function(h, context) {
    // TODO: Refactor names in favor of object spreading.
    return (
      <Layout>
        <article>
          <PageBanner
            banner={this.featuredMedia}
            title={this.title}
            subheading={this.bannerCaption}
          />
          <div
            class="px-4 lg:px-0 md:w-4/5 mx-auto mt-8"
            domPropsInnerHTML={this.content}
          />
        </article>
      </Layout>
    );
  },
};
</script>
