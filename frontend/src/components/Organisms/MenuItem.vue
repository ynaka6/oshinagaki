<template>
  <div class="bg-white rounted px-6 py-4 mb-2">
    <div class="w-full flex justify-between items-center">
      <div
        v-text="`${formatDate} のお品書き`"
        class="font-bold text-gray-800 font-acgyosyo text-3xl"
      />
      <div>
        <router-link :to="`menu/${menu.id}/edit`">
          <icon class="inline w-6 h-6 mr-1 fill-current" name="note-line" />
        </router-link>
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
}
</script>
