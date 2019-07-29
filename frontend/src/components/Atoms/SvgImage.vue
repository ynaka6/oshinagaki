<template>
  <img :src="src" :alt="name" />
</template>

<script>
export default {
  props: {
    name: {
      type: String,
      validator: (val) => [
        'page_not_found'
      ].includes(val)
    },
    alt: String,
  },
  computed: {
    src: function() {
      return require(`@/assets/svg/${this.name}.svg`)
    },
  },
}
</script>
