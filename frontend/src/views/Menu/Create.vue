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
      <div class="w-1/3 text-right"></div>
    </div>
    <div class="lg:w-2/3 mx-auto my-5">
      <menu-form
        :menu="menu"
        :wallpapers="wallpapers"
        :fonts="fonts"
        :errors="errors"
        @save-menu="createMenu"
      />
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { Menu, Wallpaper, Font, ServerErrors } from '@/store/types';
import PageTitle from '@/components/Molecules/PageTitle.vue'
import MenuForm from '@/components/Organisms/MenuForm/Index.vue'
import axios from 'axios';

@Component({
  components: {
    PageTitle,
    MenuForm,
  },
})
export default class MenuCreateView extends Vue {
  private menu: Menu = {
    id: null,
    font_id: null,
    wallpaper_id: null,
    date: '',
    signature_title: '',
    signature_name: '',
    sections: [
      {
        id: null,
        menu_id: null,
        title: '',
        items: [
          {
            id: null,
            menu_section_id: null,
            title: '',
          },
        ],
      },
    ],
  };
  private wallpapers: Wallpaper[] = [];
  private fonts: Font[] = [];
  private errors: ServerErrors = {};

  public created() {
    axios.get('/api/wallpapers')
      .then(response => {
        this.wallpapers = response.data;
      })
    ;
    axios.get('/api/fonts')
      .then(response => {
        this.fonts = response.data;
      })
    ;
  }

  private createMenu(menu: Menu) {
    axios.post(`/api/menu/create`, menu)
      .then(response => {
        console.log(response);
        this.$router.push('/menus');
      })
      .catch(err => {
        const response = err.response;
        this.errors = response.data.errors as ServerErrors;
        console.log(this.errors)
      })
    ;
  }
}
</script>
