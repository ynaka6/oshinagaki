<template>
  <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="onSubmit">
    <div class="flex flex-wrap">
      <date-input
        v-model="menu.date"
        :value="menu.date"
        label="日付"
        class="mt-3 px-2 w-full lg:w-1/2"
        :errors="errors.date"
      />
      <text-input
        type="text"
        v-model="menu.title"
        label="タイトル"
        class="mt-3 px-2 w-full lg:w-1/2"
        :errors="errors.title"
      />
      <select-input
          v-model="menu.wallpaper_id"
          :value="menu.wallpaper_id"
          class="mt-3 px-2 w-full lg:w-1/2"
          label="壁紙"
          :errors="errors.wallpaper_id"
      >
        <option value=""></option>
        <option
          v-for="wallpaper in wallpapers" :key="wallpaper.id"
          :value="wallpaper.id"
        >
          {{ wallpaper.name }}
        </option>
      </select-input>
      <select-input
        type="text"
        v-model="menu.font_id"
        :value="menu.font_id"
        class="mt-3 px-2 w-full lg:w-1/2"
        label="フォント"
        :errors="errors.font_id"
      >
        <option
          v-for="font in fonts" :key="font.id"
          :value="font.id"
        >
          {{ font.name }}
        </option>
      </select-input>
      <text-input
        type="text"
        v-model="menu.signature_title"
        label="署名"
        class="mt-3 px-2 w-full lg:w-1/2"
        :errors="errors.signature_title"
      />
      <text-input
        type="text"
        v-model="menu.signature_name"
        class="mt-3 px-2 w-full lg:w-1/2"
        label="氏名"
        :errors="errors.signature_name"
      />
    </div>
    <div
      v-if="menu.sections.length > 0"
      class="mt-5 bg-grey-lightest border-t border-grey-lighter"
    >
      <h3 class="text-center mt-8 font-bold text-2xl">メニュー</h3>
      <section-form
        v-for="(section, index) in menu.sections" :key="index"
        :section="section"
        :index="index"
        :showDeleteButton="menu.sections.length > 1"
        :errors="errors.sections && errors.sections[index] ? errors.sections[index] : {}"
        @delete-section="deleteSection"
      />
    </div>
    <div class="mt-3 px-2">
      <a
        class="bg-orange-500 px-5 py-2 rounded-full text-white"
        @click.prevent="onClickAddSection"
      >
        追加
      </a>
    </div>


    <div class="mt-5 px-10 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-between items-center">
      <button
        type="submit"
        class="w-full bg-orange-500 p-2 rounded text-white"
      >
        保存
      </button>
    </div>
  </form>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import { Menu, Wallpaper, Font, ServerErrors } from '@/store/types';
import TextInput from '@/components/Molecules/TextInput.vue';
import SelectInput from '@/components/Molecules/SelectInput.vue';
import DateInput from '@/components/Molecules/DateInput.vue';
import SectionForm from './SectionForm.vue';

@Component({
  components: {
    TextInput,
    SelectInput,
    DateInput,
    SectionForm,
  },
})
export default class MenuForm extends Vue {
  @Prop()
  menu!: Menu;
  @Prop()
  wallpapers!: Wallpaper[];
  @Prop()
  fonts!: Font[];
  @Prop()
  errors!: ServerErrors;

  @Emit('save-menu')
  private onSubmit() {
    return this.menu;
  }

  private onClickAddSection() {
    this.menu.sections.push({
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
    })
  }

  private deleteSection(index: number) {
    this.menu.sections.splice(index, 1);
    if (this.errors.sections && this.errors.sections[index]) {
      this.errors.sections.splice(index, 1);
    }
  }
  
}
</script>
