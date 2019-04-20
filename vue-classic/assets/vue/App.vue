<script>
// Page Templates
import Page from '@/templates/Pages/Page.vue';
import Blog from '@/templates/Pages/Blog.vue';
import Listing from '@/templates/Pages/Listing.vue';

// Single Templates.
import Post from '@/templates/Singles/Post.vue';

export default {
  name: 'App',
  functional: true,
  props: {
    component: {
      type: String,
      required: true,
    },
    props: Object,
    // Future TODO: Find cleaner workaround for component registration.
    components: {
      type: Object,
      default() {
        return {
          Page,
          Blog,
          Post,
          Listing,
        };
      },
    },
  },
  render: function(h, context) {
    let { component, props, components } = context.props;
    return h(components[component], {
      props: { ...props },
    });
  },
};
</script>
