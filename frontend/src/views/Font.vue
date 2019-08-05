<template>
  <div>
    <div class="flex justify-between items-center">
      <div class="w-1/3">
        <return-button to="/" />
      </div>
      <page-title title="フォント" subtitle="利用可能なフォントが表示されます" icon="font-size" />
      <div class="w-1/3 text-right"></div>
    </div>
    <div class="lg:w-2/3 mx-auto my-5">
        <div
            v-for="font in fonts" :key="font.id"
            class="mt-5 mb-10"
            :class="`font-${font.slug}`"
        >
          <h2 v-text="font.name" class="text-center font-bold text-xl mb-2" />
          <div
            class="flex justify-center bg-white rounted border p-4"
          >
            <p
              class="text-2xl"
            >
              あいうえおかきくけこ<br>
              アイウエオカキクケコ<br>
              漢字一二三四五山川海
            </p>
          </div>
        </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import axios from 'axios';
import { Font } from '@/store/types';
import ReturnButton from '@/components/Atoms/ReturnButton.vue'
import PageTitle from '@/components/Molecules/PageTitle.vue'

@Component({
  components: {
    ReturnButton,
    PageTitle,
  },
})
export default class FontView extends Vue {
  private fonts: Font[] = [];

  public created() {
      axios.get('/api/fonts')
        .then(response => {
          this.fonts = response.data
        })
      ;
  }
}
</script>
