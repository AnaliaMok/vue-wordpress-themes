<script>
import PageBanner from '@/components/PageBanner.vue';

export default {
  name: 'Page',
  props: {
    title: String,
    content: String,
    thumbnail: Object,
  },
  render(h) {
    return (
      <Layout>
        <PageBanner banner={this.thumbnail} title={this.title} />
        <section
          domPropsInnerHTML={this.content}
          class="mt-8 font-sans font-medium leading-normal page-content text-base px-4 md:px-0 md:w-4/5 mx-auto"
        />
        {this.$slots.default}
      </Layout>
    );
  },
};
</script>
