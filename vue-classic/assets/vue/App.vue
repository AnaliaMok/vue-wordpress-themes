<template>
	<h2>{{ component }}</h2>
</template>

<script>
// TODO: Dynamic import beforeCreate
export default {
  init() {
    import(`@/templates/${this.component}`);
  },
  props: {
    component: {
      type: String,
      required: true
    },
    props: {
      type: Object,
      required: true
    }
  }
};
</script>

<style>
</style>
