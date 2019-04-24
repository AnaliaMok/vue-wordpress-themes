<script>
import Pager from '@/components/Pager.vue';

export default {
  props: {
    title: String,
    content: String,
    params: String,
    postType: {
      type: String,
      default: 'posts',
    },
  },
  render(h) {
    return (
      <Layout>
        <section class="md:w-4/5 mx-auto px-4 py-8 md:p-0">
          <h2>{this.title}</h2>
          <div domPropsInnerHTML={this.content} class="leading-normal" />
          <hr class="border-grey-dark mt-4 mb-8" />
        </section>
        <Pager resourceType={this.postType} params={this.params} />
      </Layout>
    );
  },
};
</script>

<style scoped>
hr {
  border-bottom-width: 1px;
}
</style>
