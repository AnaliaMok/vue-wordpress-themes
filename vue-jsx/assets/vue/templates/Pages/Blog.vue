<script>
import Page from '@/templates/Pages/Page.vue';
import Pager from '@/components/Pager.vue';

export default {
  props: {
    title: {
      type: String,
      default: 'Welcome to Our Blog',
    },
    thumbnail: Object,
    content: String,
  },
  data() {
    return {
      posts: [],
    };
  },
  render(h, context) {
    return (
      <Page
        title={this.title}
        content={this.content}
        thumbnail={this.thumbnail}
      >
        <Pager resourceType="posts" />
      </Page>
    );
  },
};
</script>
