<template>
	<section>
    <template v-for="post in posts">
      <component :is="pagedComponent" :item="post" :key="post.id"></component>
    </template>
		<h1 v-if="posts.length === 0" class="block w-4/5 mx-auto font-display text-center mb-8">No posts found</h1>
		<div class="pager block w-4/5 mx-auto">
			<ul class="list-reset flex text-center justify-center">
				<li><button @click="prevPage">Prev</button></li>
				<li><button @click="nextPage">Next</button></li>
			</ul>
		</div>
	</section>
</template>

<script>
import PostPreview from '@/components/PostPreview.vue';

export default {
  components: {
    PostPreview,
  },
  props: {
    resourceType: {
      type: String,
      default: 'posts',
    },
  },
  data() {
    return {
      currentPage: 1,
      totalPages: 1,
      posts: [],
    };
  },
  created() {
    this.getPosts();
  },
  watch: {
    currentPage: function(oldValue, newValue) {
      this.getPosts();
    },
  },
  computed: {
    pagedComponent() {
      if (this.resourceType === 'posts') {
        return 'PostPreview';
      }
      // return 'PostPreview';
    },
  },
  methods: {
    getPosts: function() {
      const resourceUrl = `${window.location.origin}/wp-json/wp/v2/${
        this.resourceType
      }?per_page=9&page=${this.currentPage}`;

      fetch(resourceUrl, { credentials: 'same-origin' })
        .then(res => {
          this.totalPages = res.headers.get('X-WP-TotalPages');
          return res.json();
        })
        .then(data => {
          console.log(data);
          this.posts = data;
        });
    },
    nextPage() {
      this.currentPage =
        this.currentPage >= this.totalPages ? 1 : this.currentPage + 1;
    },
    prevPage() {
      this.currentPage =
        this.currentPage <= 1 ? this.totalPages : this.currentPage - 1;
    },
  },
};
</script>

<style>
</style>
