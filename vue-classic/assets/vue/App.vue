<template>
	<h2>{{ component }}</h2>
</template>

<script>
// TODO: Dynamic import beforeCreate
export default {
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
