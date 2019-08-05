<template>
  <div>
    <div class="flex justify-between items-center">
      <div class="w-1/3">
        <return-button to="/" />
      </div>
      <page-title title="メニュー" subtitle="メニューを管理するページです" icon="event" />
      <div class="w-1/3 text-right">
        <router-link
          to="/menu/create"
          class="bg-orange-500 px-4 py-1 rounded-full text-xs text-white router-link-active hover:bg-orange-400"
        >
          追加
        </router-link>
      </div>
    </div>
    <div class="lg:w-2/3 mx-auto my-5">
      <menu-item
        v-for="menu in menus" :key="menu.id"
        class="w-full"
        :menu="menu"
        @delete-menu="deleteMenu"
      />
      <div v-if="next" class="flex">
        <a
          class="flex items-center mx-auto btn-teal text-xl px-16 h-12 rounded-full hover:underline"
          @click.prevent="onClickNextMedia"
        >
          続き >>
        </a>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import ReturnButton from '@/components/Atoms/ReturnButton.vue'
import PageTitle from '@/components/Molecules/PageTitle.vue'
import MenuItem from '@/components/Organisms/MenuItem.vue';
import { Menu } from '@/store/types';
import axios from 'axios';

@Component({
  components: {
    ReturnButton,
    PageTitle,
    MenuItem
  },
})
export default class MenuIndexView extends Vue {
  private menus: Menu[] = [];
  private next: number | null = null;
  private $dialog: any;

  public created() {
    this.fetchData();
  }

  private onClickNextMedia()
  {
    this.fetchData();
  }

  private fetchData()
  {
    let url = '/api/menus';
    if (this.next) {
      url = `${url}?next=${this.next.toString()}`;
    }
    axios.get(url)
      .then(response => {
        const { menus, next } = response.data;
        this.menus = [...this.menus, ...menus];
        this.next = next;
      })
    ;
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
