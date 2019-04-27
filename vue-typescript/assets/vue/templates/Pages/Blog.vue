<template>
  <Page :title="title" :content="content" :thumbnail="thumbnail">
		<!-- <Pager resourceType="posts"/> -->
  </Page>
</template>

<script lang="ts">
import Page from '@/templates/Pages/Page.vue';
// import Pager from '@/components/Pager.vue';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia, WPPost } from '@/wordpressTypes.d.ts';

@Component({
  components: {
    Page,
    // Pager,
  },
})
export default class Blog extends Vue {
  @Prop({ default: 'Welcome to Our Blog' }) readonly title!: string;
  @Prop() readonly thumbnail!: WPMedia;
  @Prop() readonly content!: string;

  posts: WPPost[] = new Array<WPPost>();
}
</script>
