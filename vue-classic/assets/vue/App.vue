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
    component: String,
    props: Object,
    // Future TODO: Find cleaner workaround for component registration.
    // Might be easier solved in JSX implementation.
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

    if (
      component === undefined ||
      !Object.keys(components).includes(component)
    ) {
      // FUTURE TODO: Fallback to page markup?
      return h('Layout');
    }

    return h(components[component], {
      props: { ...props },
    });
  },
};
</script>
