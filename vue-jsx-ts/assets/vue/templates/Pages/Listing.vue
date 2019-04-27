<template>
	<Layout>
		<section class="md:w-4/5 mx-auto px-4 py-8 md:p-0">
			<h2>{{ title }}</h2>
			<div v-html="content" class="leading-normal"></div>
			<hr class="border-grey-dark mt-4 mb-8">
		</section>
		<Pager :resourceType="postType" :params="params" />
	</Layout>
</template>

<script lang="ts">
import Pager from '@/components/Pager.vue';
import { Vue, Component, Prop } from 'vue-property-decorator';

@Component({
  components: {
    Pager,
  },
})
export default class Listing extends Vue {
  @Prop(String) readonly title!: string;
  @Prop(String) readonly content!: string;
  @Prop(String) readonly params!: string;
  @Prop({ type: String, default: 'posts' }) readonly postType!: string;
}
</script>

<style scoped>
hr {
  border-bottom-width: 1px;
}
</style>
