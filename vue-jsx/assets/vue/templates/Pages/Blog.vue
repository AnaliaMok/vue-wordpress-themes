<template>
  <Page :title="title" :content="content" :thumbnail="thumbnail">
		<Pager resourceType="posts"/>
  </Page>
</template>

<script>
import Page from '@/templates/Pages/Page.vue';
import Pager from '@/components/Pager.vue';

export default {
  components: {
    Page,
    Pager,
  },
  props: {
    title: {
      type: String,
      default: 'Welcome to Our Blog',
    },
    thumbnail: Object,
    content: String,
  },
  data() {
    return {
      posts: [],
      currentPage: 1,
    };
  },
};
</script>
