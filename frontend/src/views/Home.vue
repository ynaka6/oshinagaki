<template>
  <div class="w-full px-0 md:mt-8 mb-16 text-gray-800 leading-normal">			
    <div class="flex flex-wrap">
      <router-link
        to="/wallpapers"
        class="block w-full md:w-1/2 xl:w-1/3 pb-3 md:p-3"
      >
        <div class="bg-white border rounded shadow p-2 hover:bg-gray-100 hover:shadow-lg">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
              <div class="rounded p-3 bg-green-600">
                <icon class="w-6 h-6 text-white fill-current" name="image-gallery" />
              </div>
            </div>
            <div class="flex-1 text-right md:text-center">
              <h5 class="font-bold text-gray-500 font-acgyosyo">壁紙</h5>
              <h3 class="font-bold text-3xl">{{ wallpaperCount }}</h3>
            </div>
          </div>
        </div>
      </router-link>
      <router-link
        to="/font"
        class="block w-full md:w-1/2 xl:w-1/3 pb-3 md:p-3"
      >
        <div class="bg-white border rounded shadow p-2 hover:bg-gray-100 hover:shadow-lg">
            <div class="flex flex-row items-center">
              <div class="flex-shrink pr-4">
                <div class="rounded p-3 bg-yellow-600">
                  <icon class="w-6 h-6 text-white fill-current" name="font-size" />
                </div>
              </div>
              <div class="flex-1 text-right md:text-center">
                <h5 class="font-bold text-gray-500 font-acgyosyo">フォント</h5>
                <h3 class="font-bold text-3xl">{{ fontCount }}</h3>
              </div>
            </div>
        </div>
      </router-link>
      <router-link
        to="/menus"
        class="block w-full md:w-1/2 xl:w-1/3 pb-3 md:p-3"
      >
        <div class="bg-white border rounded shadow p-2 hover:bg-gray-100 hover:shadow-lg">
          <div class="flex flex-row items-center">
            <div class="flex-shrink pr-4">
              <div class="rounded p-3 bg-orange-600">
                <icon class="w-6 h-6 text-white fill-current" name="event" />
              </div>
            </div>
            <div class="flex-1 text-right md:text-center">
              <h5 class="font-bold text-gray-500 font-acgyosyo">メニュー</h5>
              <h3 class="font-bold text-3xl">{{ menuCount }}</h3>
            </div>
          </div>
        </div>
      </router-link>
    </div>
    <div v-show="menus.length > 0">
      <page-title title="最新のメニュー" icon="event" class="mt-16" />
      <div class="lg:w-2/3 mx-auto my-5">
        <menu-item
          v-for="menu in menus" :key="menu.id"
          class="w-full"
          :menu="menu"
          @delete-menu="deleteMenu"
        />
        <div class="text-center mt-10">
          <router-link
            to="/menus"
            class="bg-orange-500 px-8 py-4 rounded-full text-xl text-white router-link-active hover:bg-orange-400"
          >
            <icon class="inline w-4 h-4 mr-2 fill-current" name="event" />
            メニューページへ
          </router-link>
        </div>
      </div>
    </div>
  </div>
  
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Icon from '@/components/Atoms/Icon.vue'
import PageTitle from '@/components/Molecules/PageTitle.vue'
import MenuItem from '@/components/Organisms/MenuItem.vue';;
import { Menu } from '@/store/types';
import axios from 'axios';

@Component({
  components: {
    Icon,
    PageTitle,
    MenuItem,
  },
})
export default class HomeView extends Vue {
  private wallpaperCount: number = 0;
  private fontCount: number = 0;
  private menuCount: number = 0;
  private menus: Menu[] = [];
  private $dialog: any;

  public created() {
    Promise.all([
      axios.get('/api/wallpaper/count'),
      axios.get('/api/font/count'),
      axios.get('/api/menu/count'),
      axios.get('/api/menus'),
    ]).then(([
      wallpaperCountResponse,
      fontCountResponse,
      menuCountResponse,
      menusResponse,
    ]) => {
      this.wallpaperCount = wallpaperCountResponse.data;
      this.fontCount = fontCountResponse.data;
      this.menuCount = menuCountResponse.data;

      const { menus } = menusResponse.data;
      this.menus = [...this.menus, ...menus];
    });
  }

  deleteMenu(menu: Menu) {
    this.$dialog
      .confirm('メニュー削除してもいいですか？', {
        okText: "削除",
        cancelText: "閉じる",
      })
      .then((dialog: any) => {
        axios.delete(`/api/menu/${menu.id}/destroy`)
          .then(response => {
            const index = this.menus.findIndex((e: Menu) => e.id === menu.id);
            this.menus.splice(index, 1);
          })
        ;
      });
  }
}
</script>
