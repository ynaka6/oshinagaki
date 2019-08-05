<template>
  <div class="bg-white rounted px-6 py-4 mb-2">
    <div class="w-full flex justify-between items-center">
      <div
        v-text="`${formatDate} のお品書き`"
        class="font-bold text-gray-800 font-acgyosyo text-3xl"
      />
      <div>
        <router-link
          :to="`menu/${menu.id}/edit`"
          v-tooltip="'編集'"
        >
          <icon class="inline w-6 h-6 mr-2 fill-current hover:opacity-75" name="note-line" />
        </router-link>
        <router-link
          :to="`menu/${menu.id}/copy`"
          v-tooltip="'コピー'"
        >
          <icon class="inline w-6 h-6 mr-2 fill-current hover:opacity-75" name="copy-line" />
        </router-link>
        <a
          href="#"
          v-tooltip="'削除'"
          class="text-red-500"
          @click.prevent="onClickDelete"
        >
          <icon class="inline w-6 h-6 fill-current hover:opacity-75" name="trash" />
        </a>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import { Menu } from '@/store/types';
import dayjs from 'dayjs';
import Icon from '@/components/Atoms/Icon.vue';

@Component({
  components: {
    Icon
  },
})
export default class MenuItem extends Vue {
  @Prop()
  menu!: Menu;

  get formatDate () {
    return dayjs(this.menu.date).format('YYYY年MM月DD日');
  }

  @Emit('delete-menu')
  private onClickDelete() {
    return this.menu;
  }
}
</script>
