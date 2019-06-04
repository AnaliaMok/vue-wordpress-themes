import { Vue, Component, Prop } from 'vue-property-decorator';
import { VNode, CreateElement } from 'vue';

// Page Templates
import Page from '@/templates/Pages/Page';
import FrontPage from '@/templates/Pages/FrontPage';
// import Blog from '@/templates/Pages/Blog.vue';
// import Listing from '@/templates/Pages/Listing.vue';

// Single Templates.
// import Post from '@/templates/Singles/Post.vue';

interface IComponentsMap {
  Page: string;
  FrontPage: string;
  // Blog: string;
  // Post: string;
  // Listing: string;
  [key: string]: string;
}

@Component
export default class App extends Vue {
  @Prop(String) readonly component!: string;
  @Prop(Object) readonly props!: object;
  @Prop({ default: () => ({ Page, FrontPage }) }) //, FrontPage, Blog, Post, Listing
  readonly components!: IComponentsMap;

  // components:IComponentsMap = { Page: Page };

  render(h: any): VNode {
    return h(this.components[this.component], {
      props: { ...this.props },
    });
  }
}

