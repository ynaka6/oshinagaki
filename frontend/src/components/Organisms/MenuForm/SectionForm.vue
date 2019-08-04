<template>
  <div class="w-full flex border-b">
    <div class="mt-3 px-2 lg:w-1/3">
      <text-input
        type="text"
        v-model="section.title"
        label="項目"
        class="w-full"
        :errors="errors.title"
      />
      <div class="mt-1 mb-2">
        <a
          v-show="showDeleteButton"
          class="bg-red-500 px-3 py-1 rounded-full text-white text-xs hover:opacity-75"
          @click.prevent="onClickDeleteSection"
        >
          削除
        </a>
      </div>
    </div>
    <div class="mt-3 px-2 w-full lg:w-2/3">
      <div
        v-if="section.items.length > 0"
        class="w-full"
        style="margin-top: 1.75rem;"
      >
        <item-form
          v-for="(item, index) in section.items" :key="index"
          :item="item"
          :index="index"
          :showDeleteButton="section.items.length > 1"
          :errors="errors.items && errors.items[index] ? errors.items[index] : {}"
          @delete-item="deleteItem"
        />
      <div class="mt-1 mb-2">
        <a
          class="bg-orange-500 px-3 py-1 rounded-full text-white text-xs hover:opacity-75"
          @click.prevent="onClickAddItem"
        >
          追加
        </a>
      </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import { MenuSection, ServerErrors } from '@/store/types';
import TextInput from '@/components/Molecules/TextInput.vue';
import ItemForm from './ItemForm.vue';

@Component({
  components: {
    TextInput,
    ItemForm,
  },
})
export default class SectionForm extends Vue {
  @Prop()
  section!: MenuSection;
  @Prop({ type: Number })
  index!: number;
  @Prop({ type: Number, default: true })
  showDeleteButton!: boolean;
  @Prop()
  errors!: ServerErrors;

  @Emit('delete-section')
  private onClickDeleteSection() {
    return this.index;
  }

  private deleteItem(index: number) {
    this.section.items.splice(index, 1);
    if (this.errors.items && this.errors.items[index]) {
      this.errors.items.splice(index, 1);
    }
  }

  private onClickAddItem() {
    this.section.items.push({
      id: null,
      menu_section_id: null,
      title: '',
    })
  }
}
</script>
