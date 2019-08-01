<template>
  <img :src="src" :alt="name" />
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';

@Component
export default class Icon extends Vue {
  @Prop({ type: String, validator: (val) => ['page_not_found'].includes(val) })
  name!: string;
  @Prop({ type: String })
  alt!: string;

  public get src(): string {
    return require(`@/assets/svg/${this.name}.svg`);
  }
};
</script>

