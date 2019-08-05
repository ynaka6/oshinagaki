<template>
  <section
    v-show="menu"
    class="sheet"
    :class="`font-${menu.font ? menu.font.slug : ''}`"
    :style="{ backgroundImage: `url(${menu.wallpaper ? menu.wallpaper.url : ''})` }"
  >
    <div class="flex w-full">
      <div
        v-for="n in 2"
        :key="n"
        class="flex-1 mx-auto pt-5 pb-3"
      >
        <h1 class="ml-10" v-text="menu.title || 'お品書き'" />

        <div
          v-for="section in menu.sections"
          :key="section.id"
          class="flex mx-5"
        >
            <h2 class="whitespace-no-wrap h-24" v-text="section.title" />
            <div class="flex-auto">
                <p
                  v-for="item in section.items" :key="item.id"
                  v-text="item.title"
                />
            </div>
        </div>
        <div class="mr-20">
            <p class="mt-24 flex-auto" v-text="menu.date" />
        </div>
        <div class="mr-12">
            <p class="mt-24 flex-auto" v-text="menu.signature_title" />
            <p class="mt-32 flex-auto" v-text="menu.signature_name" />
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import { Menu, Wallpaper, Font } from '@/store/types';
import 'paper-css/paper.css';
import axios from 'axios';
import dayjs from 'dayjs';
import { convertCaJapanese } from '@/utils/date-utils';

@Component({
})
export default class MenuPreviewView extends Vue {
  private menu: Menu | null = null;

  public created() {
    Promise.all([
      axios.get(`/api/menu/${this.$route.params.id}`),
    ]).then(([
      menuResponse,
    ]) => {
      const menu = menuResponse.data;
      menu.date = dayjs(menu.date).format('YYYY-MM-DD');
      const date = new Date(menu.date);
      menu.date = convertCaJapanese(date);
      this.menu = menu;
    });
  }

  public mounted() {
    const el = document.body;
    el.classList.add('A4');
    el.classList.add('landscape');
  }
}
</script>


<style scoped>
  section {
    -ms-writing-mode: tb-rl;
    writing-mode: vertical-rl;
    background-position:top bottom !important;
    background-repeat: no-repeat !important;
    background-size:cover !important;
  }
  h1 {
    text-align: center;
    font-size: 1.8rem;
  }
  h2 {
    font-size: 1.1rem;
  }
  p {
    font-size: 1.1rem;
  }
</style>
