<template>
  <div class="flex items-center">
    <text-input
      type="text"
      v-model="item.title"
      :errors="errors.title"
      class="w-full"
    />
    <a
      href="#"
      class="block w-4 ml-2"
      @click.prevent="onClickDeleteSection"
    >
      <icon
        v-if="showDeleteButton"
        class="text-red-500 fill-current"
        name="times-circle-solid"
      />
    </a>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import { MenuSectionItem, ServerErrors } from '@/store/types';
import Icon from '@/components/Atoms/Icon.vue';
import TextInput from '@/components/Molecules/TextInput.vue';

@Component({
  components: {
    Icon,
    TextInput,
  },
})
export default class SectionForm extends Vue {
  @Prop()
  item!: MenuSectionItem;
  @Prop({ type: Number })
  index!: number;
  @Prop({ type: Number, default: true })
  showDeleteButton!: boolean;
  @Prop()
  errors!: ServerErrors;

  @Emit('delete-item')
  private onClickDeleteSection() {
    return this.index;
  }
}
</script>
