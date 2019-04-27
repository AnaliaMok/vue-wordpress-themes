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

@Component({
  components: {
    PageBanner,
  },
})
export default class Page extends Vue {
  @Prop() readonly title!: string;
  @Prop() readonly content!: string;
  @Prop() readonly thumbnail!: object;
}
</script>
