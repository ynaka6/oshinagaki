<template>
  <div>
    <page-title title="壁紙" subtitle="壁紙として利用する画像をアップロードし管理可能ができます" icon="image-gallery" />
    <div class="lg:w-2/3 mx-auto my-5">
      <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-gray-800 rounded-lg shadow-lg tracking-wide border cursor-pointer hover:bg-gray-100 hover:opacity-75">
          <icon class="w-8 h-8 text-gray-800 fill-current" name="upload" />
          <span class="mt-2 text-base leading-normal">ファイルを選択してください</span>
          <input
            type="file"
            name="file"
            ref="file"
            class="hidden"
            accept="image/*"
            @change="onSelectedMedia"
          />
      </label>
      <div class="flex flex-wrap mt-5 bg-white">
        <wallpaper-item
          v-for="wallpaper in wallpapers" :key="wallpaper.id"
          class="w-full lg:w-1/2 px-3 my-3"
          :wallpaper="wallpaper"
          @update-wallpaper="updateWallpaper"
        />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Emit, Vue } from 'vue-property-decorator';
import axios from 'axios';
import { Wallpaper } from '@/store/types';
import Icon from '@/components/Atoms/Icon.vue';
import PageTitle from '@/components/Molecules/PageTitle.vue';
import WallpaperItem from '@/components/Organisms/WallpaperItem.vue';

@Component({
  components: {
    Icon,
    PageTitle,
    WallpaperItem,
  },
})
export default class WallpaperView extends Vue {
  private wallpapers: Wallpaper[] = [];

  public created() {
    axios.get('/api/wallpapers')
      .then(response => {
        this.wallpapers = response.data;
      })
    ;
  }

  private onSelectedMedia() {
    const fileElement = (this.$refs.file as HTMLInputElement | null);
    if (fileElement) {
      const files = fileElement.files as FileList;
      let formData = new FormData();
      formData.append('file', files[0]);
      axios.defaults.headers.post['Content-Type'] = 'multipart/form-data';
      axios.post('/api/wallpaper/upload', formData)
        .then(response => {
          this.wallpapers = response.data;
        })
      ;
    }
  }

  updateWallpaper(wallpaper: Wallpaper) {
    axios.post(`/api/wallpaper/${wallpaper.id}/update`, wallpaper)
      .then(response => {
      })
    ;
  }
}
</script>
