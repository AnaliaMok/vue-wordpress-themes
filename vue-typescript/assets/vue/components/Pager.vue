<template>
	<section>
    <template v-for="post in posts">
      <component :is="pagedComponent" :item="post" :key="post.id"></component>
    </template>
		<h1 v-show="posts.length === 0" class="block w-4/5 mx-auto font-display text-center mb-8">{{ noPostsMsg }}</h1>
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

<script lang="ts">
import PostPreview from '@/components/PostPreview.vue';
import { Vue, Component, Prop, Watch } from 'vue-property-decorator';
import { WPPost } from '@/wordpressTypes.d.ts';

@Component({
  components: {
    PostPreview,
  },
})
export default class Page extends Vue {
  @Prop({ type: String, default: 'posts' }) readonly resourceType!: string;
  @Prop(String) readonly params!: string;

  currentPage: number = 1;
  totalPages: number = 1;
  posts: Array<WPPost> = new Array<WPPost>();
  noPostsMsg: string = 'Searching for posts...';

  created() {
    this.getPosts();
  }

  @Watch('currentPage')
  getCurrentPage(oldValue: number, newValue: number) {
    this.getPosts();
  }

  /**
   * Compute component to render.
   *
   * @return string - Registered Component name.
   */
  get pagedComponent(): string {
    if (this.resourceType === 'posts') {
      return 'PostPreview';
    }
    // TODO: Extend this list when necessary.
    return '';
  }

  /**
   * Compute current range of pages to display in paginator.
   *
   * Displays a maximum of 3 pages.
   *
   * @return Array<number> - Range of page numbers to display.
   */
  get pageRange(): Array<number> {
    let start: number = this.currentPage - 1 > 0 ? this.currentPage - 1 : 1;
    let end: number = this.currentPage;

    if (this.currentPage === 1 && end + 2 <= this.totalPages) {
      end += 2;
    } else {
      end = end + 1 <= this.totalPages ? end + 1 : this.totalPages;

      if (end === this.totalPages && this.totalPages - 2 > 0) {
        start = this.totalPages - 2;
      }
    }

    let range: Array<number> = new Array<number>();
    for (var i = start; i <= end; i++) {
      range.push(i);
    }

    return range;
  }

  /**
   * Re-fetch wordpress posts using current page number and post type.
   */
  protected async getPosts() {
    let resourceUrl = `${window.location.origin}/wp-json/wp/v2/${
      this.resourceType
    }?per_page=9&page=${this.currentPage}${
      this.params ? `&${this.params}` : ''
    }`;

    // Reset while loading.
    this.noPostsMsg = 'Loading...';
    this.posts = [];

    try {
      const response = await fetch(resourceUrl, { credentials: 'same-origin' });
      this.totalPages = parseInt(<string>(
        response.headers.get('X-WP-TotalPages')
      ));
      const data = await response.json();
      if (data) {
        this.posts = data;
      } else {
        this.noPostsMsg = 'No Posts Found';
      }
    } catch (e) {
      // FUTURE TODO: Handle better.
      this.noPostsMsg = 'No Posts Found';
    }
  }

  /**
   * Triggers post refetch by updating currentPage.
   * Pre-condition: pageNum is always within range.
   *
   * @param number pageNum - Page to retrieve.
   * @return void
   */
  getPage(pageNum: number): void {
    if (pageNum > this.totalPages) {
      // Reset to first page.
      this.currentPage = 1;
    } else if (pageNum < 1) {
      // Loop backwards.
      this.currentPage = this.totalPages;
    } else {
      this.currentPage = pageNum;
    }
  }
}
</script>
