<template>
  <router-link
    :to="to"
    class="bg-orange-500 px-4 py-1 rounded-full text-xs text-white router-link-active hover:bg-orange-400"
  >
    <icon class="inline w-4 h-4 mr-1 fill-current" name="undo" />
    戻る
  </router-link>
</template>


<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import Icon from '@/components/Atoms/Icon.vue';

@Component({
  components: {
    Icon
  },
})
export default class ReturnButton extends Vue {
  @Prop({ type: String })
  private to!: string;
}
</script>
