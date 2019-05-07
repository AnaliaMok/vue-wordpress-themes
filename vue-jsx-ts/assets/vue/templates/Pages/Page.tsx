import { Vue, Component, Prop } from 'vue-property-decorator';
import PageBanner from '@/components/PageBanner';
import { WPMedia } from '@/wordpressTypes.d.ts';
import DefaultLayout from '@/layouts/DefaultLayout';
import { VNode } from 'vue';

@Component({
  components: {
    PageBanner,
  },
})
export default class Page extends Vue {
  @Prop(String) readonly title!: string;
  @Prop(String) readonly content!: string;
  @Prop({ type: Object as () => WPMedia }) readonly thumbnail!: WPMedia;

  render(h: any):VNode {
    return (
      <DefaultLayout>
        <PageBanner banner={this.thumbnail} title={this.title} />
        <section
          domPropsInnerHTML={this.content}
          class="mt-8 font-sans font-medium leading-normal page-content text-base px-4 md:px-0 md:w-4/5 mx-auto"
        />
        {this.$slots.default}
      </DefaultLayout>
    );
  }
}
