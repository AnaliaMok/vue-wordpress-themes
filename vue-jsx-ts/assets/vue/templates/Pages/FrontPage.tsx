import Page from '@/templates/Pages/Page';
// import PostsCTA from '@/components/PostsCTA.vue';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia, WPPost } from '@/wordpress-types.d.ts';
import { VNode } from 'vue';

@Component({
  components: {
    Page,
    // PostsCTA,
  },
})
export default class FrontPage extends Vue {
  @Prop(String) readonly title!: string;
  @Prop(Object) readonly thumbnail!: WPMedia;
  @Prop(Array) readonly latestposts!: Array<WPPost>;

  render(h:any): VNode {
    return (
      <Page title={this.title} thumbnail={this.thumbnail}>
        <h1 class="px-4 md:px-0 md:w-4/5 mx-auto">Our Latest Posts</h1>
        {/* <PostsCTA items={this.latestposts} /> */}
      </Page>
    );
  }
}


