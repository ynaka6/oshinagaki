<template>
  <div>
    <label v-if="label" class="block text-gray-600 text-sm font-bold mb-2" :for="id">{{ label }}:</label>
    <input
      :id="id"
      :type="type"
      ref="input"
      v-bind="$attrs"
      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-600"
      :class="{ error: errors.length }"
      :value="value"
      @input="$emit('input', $event.target.value)"
    >
    <div v-if="errors.length" class="text-red-500 text-xs italic">{{ errors[0] }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `text-input-${this._uid}`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    value: String,
    label: String,
    errors: {
      type: Array,
      default: () => [],
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}
</script>
