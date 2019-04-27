<template>
	<Layout>
		<PageBanner v-if="thumbnail" :banner="thumbnail" :title="title" />
		<section v-html="content" class="mt-8 font-sans font-medium leading-normal page-content text-base px-4 xl:px-0"></section>
    <slot/>
	</Layout>
</template>

<script lang="ts">
import { Vue, Component, Prop } from 'vue-property-decorator';
import PageBanner from '@/components/PageBanner.vue';

@Component
export default class Page extends Vue {
  @Prop(String) readonly title!: string;
  @Prop(String) readonly content!: string;
  @Prop(Object) readonly thumbnail!: object;

  // components: {
  //   PageBanner,
  // };
}
</script>
