<template>
	<Page :title="title" :thumbnail="thumbnail">
		<h1 class="px-4 md:px-0 md:w-4/5 mx-auto">Our Latest Posts</h1>
		<PostsCTA :items="latestposts" />
	</Page>
</template>

<script lang="ts">
import Page from '@/templates/Pages/Page.vue';
import PostsCTA from '@/components/PostsCTA.vue';
import { Vue, Component, Prop } from 'vue-property-decorator';
import { WPMedia, WPPost } from '@/wordpressTypes.d.ts';

@Component({
  components: {
    Page,
    PostsCTA,
  },
})
export default class FrontPage extends Vue {
  @Prop() readonly title!: string;
  @Prop() readonly thumbnail!: WPMedia;
  @Prop() readonly latestposts!: Array<WPPost>;
}
</script>

