<script>
import Page from '@/templates/Pages/Page.vue';
import PostsCTA from '@/components/PostsCTA.vue';

export default {
  props: {
    title: String,
    thumbnail: Object,
    latestposts: Array,
  },
  render(h) {
    return (
      <Page title={this.title} thumbnail={this.thumbnail}>
        <h1 class="px-4 md:px-0 md:w-4/5 mx-auto">Our Latest Posts</h1>
        <PostsCTA items={this.latestposts} />
      </Page>
    );
  },
};
</script>

