<template>
  <div>
    <page-title title="メニュー" subtitle="メニューを管理するページです" icon="image-gallery" />
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
export default class MenuIndexView extends Vue {

}
</script>
