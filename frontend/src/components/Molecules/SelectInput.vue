<template>
  <div>
    <label v-if="label" class="block text-gray-600 text-sm font-bold mb-2" :for="id">{{ label }}:</label>
    <div class="inline-block relative w-full">
      <select
        :id="id"
        ref="input"
        v-model="selected"
        v-bind="$attrs"
        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
        :class="{ 'border-red-500': errors.length }"
      >
        <slot />
      </select>
      <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
      </div>
    </div>
    <div v-if="errors.length" class="text-red-500 text-xs italic mt-1">{{ errors[0] }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    id: {
      type: String,
      default() {
        return `select-input-${this._uid}`;
      },
    },
    value: [String, Number, Boolean],
    label: String,
    errors: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      selected: this.value,
    }
  },
  watch: {
    selected(selected) {
      this.$emit('input', selected)
    },
  },
  methods: {
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
  },
};
</script>
