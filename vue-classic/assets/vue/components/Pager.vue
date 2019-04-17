<template>
	<section>
		<strong>Current Page: {{ currentPage }}; Total Pages: {{ totalPages }}</strong>
		<article v-for="post in posts" :key="post.id">{{ post.title.rendered }}</article>
		<div class="pager">
			<ul>
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
  methods: {
    getPosts: function() {
      const resourceUrl = `${window.location.origin}/wp-json/wp/v2/${
        this.resourceType
      }?per_page=9&page=${this.currentPage}`;

      fetch(resourceUrl)
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
