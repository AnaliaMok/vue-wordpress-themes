<template>
	<section>
    <template v-for="post in posts">
      <component :is="pagedComponent" :item="post" :key="post.id"></component>
    </template>
		<h1 v-if="posts.length === 0" class="block w-4/5 mx-auto font-display text-center mb-8">{{ noPostsMsg }}</h1>
		<div class="pager block w-4/5 mx-auto">
			<ul class="list-reset flex text-center justify-center" v-if="totalPages > 1">
				<li><button @click="getPage(currentPage - 1)" class="px-4 py-2">Prev</button></li>
        <li v-for="page in pageRange" :key="page">
          <button
            @click="getPage(page)"
            class="px-4 py-2"
            :class="{'font-bold text-indigo-dark cursor-not-allowed' : page === currentPage }"
          >
            {{ page }}
          </button>
        </li>
				<li><button @click="getPage(currentPage + 1)" class="px-4 py-2">Next</button></li>
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
      noPostsMsg: 'Searching for posts...',
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
    },
    pageRange() {
      // Display range of 3 pages.
      let start = this.currentPage - 1 > 0 ? this.currentPage - 1 : 1;
      let end = this.currentPage;

      if (this.currentPage === 1 && end + 2 <= this.totalPages) {
        end += 2;
      } else {
        end = end + 1 <= this.totalPages ? end + 1 : this.totalPages;

        if (end === this.totalPages && this.totalPages - 2 > 0) {
          start = this.totalPages - 2;
        }
      }

      let range = [];
      for (var i = start; i <= end; i++) {
        range.push(i);
      }

      return range;
    },
  },
  methods: {
    getPosts: function() {
      const resourceUrl = `${window.location.origin}/wp-json/wp/v2/${
        this.resourceType
      }?per_page=9&page=${this.currentPage}`;

      // Reset while loading.
      this.noPostsMsg = 'Loading...';
      this.posts = [];

      fetch(resourceUrl, { credentials: 'same-origin' })
        .then(res => {
          this.totalPages = parseInt(res.headers.get('X-WP-TotalPages'));
          return res.json();
        })
        .then(data => {
          if (data) {
            this.posts = data;
          } else {
            this.noPostsMsg = 'No Posts Found';
          }
        });
    },
    getPage(pageNum) {
      if (pageNum > this.totalPages) {
        // Reset to first page.
        this.currentPage = 1;
      } else if (pageNum < 1) {
        // Loop backwards.
        this.currentPage = this.totalPages;
      } else {
        this.currentPage = pageNum;
      }
    },
  },
};
</script>
