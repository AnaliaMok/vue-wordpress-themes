<template>
	<!-- <component :is="component"></component> -->
	<!-- <page-component></page-component> -->
</template>


<script>
export default {
  // init() {
  //   import(`@/templates/${this.component}`);
  // },
  props: {
    component: {
      type: String,
      required: true
    },
    props: {
      type: Object,
      required: true
    }
  },
  components: {
    // "page-component": () => import(`assets/vue/templates/${this.component}`)
  },
  mounted() {
    console.log(this.component);
  }
  // render: h => {
  //   console.log(this.props);
  //   // FIXME.
  //   return h(this.component, {
  //     props: {
  //       ...this.props
  //     }
  //   });
  // }
};
</script>

<style>
</style>
