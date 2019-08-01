<template>
  <div>
    <div
      class="h-48 bg-center bg-cover border border-gray-500 lg:h-64"
      :style="{ backgroundImage: `url(${wallpaper.url})` }"
    ></div>
    <div class="relative">
      <icon
        class="absolute w-5 h-5 fill-current"
        name="pencil"
        style="top: 0.6rem; left: .6rem;"
      />
      <input
        type="text"
        v-model="wallpaper.name"
        class="pl-10 py-2 border-b border-gray-600 w-full"
        @change="onChangeName"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import { Wallpaper } from '@/store/types';
import Icon from '@/components/Atoms/Icon.vue'

@Component({
  components: {
    Icon
  },
})
export default class WallpaperItem extends Vue {
  @Prop()
  wallpaper!: Wallpaper;

  @Emit('update-wallpaper')
  private onChangeName() {
    return this.wallpaper;
  }
}
</script>
