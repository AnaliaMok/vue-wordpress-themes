<script>
import { DateMixin } from '@/mixins/DateMixin.js';
import { Placeholders } from '@/helpers/constants.js';

export default {
  mixins: [DateMixin],
  props: {
    items: Array,
  },
  render(h) {
    return (
      <section class="px-4 md:px-0 md:w-4/5 mx-auto flex">
        {this.items.map((item, i) => {
          let imgProps = {
            attrs: {
              src: item.thumbnail ? item.thumbnail.url : Placeholders.thumbnail,
              alt: item.thumbnail ? item.thumbnail.alt : item.title,
            },
          };

          return (
            <div key={item.id}>
              <img {...imgProps} class="w-full" />
              <strong class="block mt-2 px-4">
                {this.getFormattedDate(item.date)}
              </strong>
              <a href={item.slug}>
                <h3 class="mt-2 px-4">{item.title}</h3>
              </a>
            </div>
          );
        })}
      </section>
    );
  },
};
</script>

<style scoped>
section {
  flex-wrap: wrap;
}
section > div {
  flex: 1 1 100%;
  margin-bottom: 2rem;
}

@media screen and (min-width: 768px) {
  section > div {
    flex: 1 1 50%;
    margin-bottom: 1rem;
  }
}

@media screen and (min-width: 992px) {
  section {
    flex-wrap: nowrap;
  }
  section > div {
    flex: 1 1 25%;
    margin-bottom: 0;
  }
}
</style>
