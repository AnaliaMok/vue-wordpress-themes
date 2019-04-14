<script>
import Page from '@/templates/Page.vue';

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
