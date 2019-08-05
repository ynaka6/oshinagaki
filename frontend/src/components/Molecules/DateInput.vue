<template>
  <div>
    <label v-if="label" class="block text-gray-600 text-sm font-bold mb-2" :for="id">{{ label }}:</label>
    <datepicker
      v-model="date"
      format="yyyy-MM-dd"
      v-bind="$attrs"
      :input-class="{ 'border-red-500': errors.length, 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-600': true }"
      @selected="onSelectedDate"
    ></datepicker>
    <div v-if="errors.length" class="text-red-500 text-xs italic mt-1">{{ errors[0] }}</div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Emit, Vue } from 'vue-property-decorator';
import Datepicker from 'vuejs-datepicker';
import dayjs from 'dayjs';

@Component({
  components: {
    Datepicker,
  },
})
export default class DateInput extends Vue {
  @Prop({ type: String, default: `date-input-` })
  private id!: string;
  @Prop({ type: String })
  private value!: string;
  @Prop({ type: String })
  private label!: string;
  @Prop({ type: Array, default: [] })
  private errors!: Array<any>;

  private date: string | null = this.value;

  @Emit('input')
  private onSelectedDate(date: Date)
  {
    return dayjs(date).format('YYYY-MM-DD');
  }
}
</script>