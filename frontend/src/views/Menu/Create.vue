<template>
  <div>
    <div class="flex justify-between items-center">
      <div class="w-1/3">
        <router-link
          to="/menus"
          class="text-xs"
        >
          戻る
        </router-link>
      </div>
      <page-title title="メニュー作成" subtitle="メニューを作成するページです" icon="event" />
      <div class="w-1/3"></div>
    </div>
    <div class="lg:w-2/3 mx-auto my-5">
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import PageTitle from '@/components/Molecules/PageTitle.vue'
import axios from 'axios';

@Component({
  components: {
    PageTitle
  },
})
export default class MenuCreateView extends Vue {

}
</script>
