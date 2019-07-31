<template>
  <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">			
    <div class="flex flex-wrap">
      <div class="w-full md:w-1/2 xl:w-1/3 p-3">
          <div class="bg-white border rounded shadow p-2">
              <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                      <div class="rounded p-3 bg-green-600">
                        <icon class="w-6 h-6 text-white fill-current" name="image-gallery" />
                      </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                      <h5 class="font-bold text-gray-500 text-acgyosyo">壁紙</h5>
                      <h3 class="font-bold text-3xl">{{ wallpaperCount }}</h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 p-3">
          <div class="bg-white border rounded shadow p-2">
              <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                      <div class="rounded p-3 bg-orange-600">
                        <icon class="w-6 h-6 text-white fill-current" name="event" />
                      </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                      <h5 class="font-bold text-gray-500 text-acgyosyo">メニュー</h5>
                      <h3 class="font-bold text-3xl">{{ menuCount }}</h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="w-full md:w-1/2 xl:w-1/3 p-3">
          <div class="bg-white border rounded shadow p-2">
              <div class="flex flex-row items-center">
                  <div class="flex-shrink pr-4">
                      <div class="rounded p-3 bg-yellow-600">
                        <icon class="w-6 h-6 text-white fill-current" name="font-size" />
                      </div>
                  </div>
                  <div class="flex-1 text-right md:text-center">
                      <h5 class="font-bold text-gray-500 text-acgyosyo">フォント</h5>
                      <h3 class="font-bold text-3xl">{{ fontCount }}</h3>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Icon from '@/components/Atoms/Icon.vue';
import axios from 'axios';

@Component({
  components: {
    Icon,
  },
})
export default class Home extends Vue {
  private wallpaperCount: number = 0;
  private menuCount: number = 0;
  private fontCount: number = 0;


  public created() {
      axios.get('/api/font/count')
        .then(response => {
          console.log(response.data)
          this.fontCount = response.data
        })
      ;
  }
}
</script>
