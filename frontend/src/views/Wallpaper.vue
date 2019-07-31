<template>
  <div>
    <page-title title="壁紙" subtitle="壁紙として利用する画像をアップロードし管理可能ができます" icon="image-gallery" />
    <div class="lg:w-2/3 mx-auto my-5">
      <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-gray-800 rounded-lg shadow-lg tracking-wide border cursor-pointer hover:bg-gray-100 hover:opacity-75">
          <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
          </svg>
          <span class="mt-2 text-base leading-normal">ファイルを選択してください</span>
          <input type="file" name="file" ref="file" class="hidden" @change="onSelectedMedia" />
      </label>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import PageTitle from '@/components/Molecules/PageTitle.vue'
import axios from 'axios';

export type Wallpaper = {
    id: number;
    name: string;
    url: string;
};

@Component({
  components: {
    PageTitle,
  },
})
export default class WallpaperView extends Vue {
  private wallpapers: Wallpaper[] = [];

  public created() {
    axios.get('/api/wallpapers')
      .then(response => {
        this.wallpapers = response.data
      })
    ;
  }

  private onSelectedMedia() {
    const fileElement = (this.$refs.file as HTMLInputElement | null);
    if (fileElement) {
      const files = fileElement.files as FileList;
      let formData = new FormData()
      formData.append('file', files[0])
      console.log(formData)

      axios.defaults.headers.post['Content-Type'] = 'multipart/form-data'
      axios.post('/api/wallpaper/upload', formData)
        .then(response => {
          this.wallpapers = response.data
          console.log(response.data)
        })
      ;
    }
  }
}
</script>
