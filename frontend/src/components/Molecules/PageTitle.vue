<template>
  <div class="w-full">
    <h1 class="font-bold text-2xl text-center mb-1 lg:text-3xl">
      <icon v-if="icon" class="inline w-6 h-6 mr-1 fill-current" :name="icon" />
      {{ title }}
    </h1>
    <p v-if="subtitle" class="text-center text-gray-600 text-xs lg:text-sm" v-text="subtitle" />
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import Icon from '@/components/Atoms/Icon.vue'

@Component({
  components: {
    Icon
  },
})
export default class PageTitle extends Vue {
  @Prop({ type: String })
  title!: string;
  @Prop({ type: String, default: null })
  subtitle!: string;
  @Prop({ type: String, default: null })
  icon!: string;
}
</script>
