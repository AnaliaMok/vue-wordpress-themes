<script lang="ts">
import { Vue, Component, Prop } from 'vue-property-decorator';
import { VNode } from 'vue';

// Page Templates
import Page from '@/templates/Pages/Page.vue';
import FrontPage from '@/templates/Pages/FrontPage.vue';
import Blog from '@/templates/Pages/Blog.vue';
import Listing from '@/templates/Pages/Listing.vue';

// Single Templates.
import Post from '@/templates/Singles/Post.vue';

interface IComponentsMap {
  Page: string;
  FrontPage: string;
  Blog: string;
  Post: string;
  Listing: string;
  [key: string]: string;
}

@Component
export default class App extends Vue {
  @Prop(String) readonly component!: string;
  @Prop(Object) readonly props!: object;
  @Prop({ type: Object, default: { Page, FrontPage, Blog, Post, Listing } })
  readonly components!: IComponentsMap;

  // functional: true, // TODO: Re-add

  render(h: Function): VNode {
    if (
      this.component === undefined ||
      !Object.keys(this.components).includes(this.component)
    ) {
      // FUTURE TODO: Fallback to page markup?
      return h('Layout');
    }

    return h(this.components[this.component], {
      props: { ...this.props },
    });
  }
}
</script>
