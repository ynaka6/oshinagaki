<template>
  <div class="p-6 bg-gray-200 min-h-screen flex justify-center items-center">
    <div class="w-full max-w-sm">
      <form class="mt-8 bg-white rounded-lg shadow-lg overflow-hidden" @submit.prevent="onSubmit">
        <div class="px-10 py-12">
          <h1 class="text-center font-bold text-3xl uppercase">Login</h1>
          <div class="mx-auto mt-6 w-24 border-b-2" />
          <text-input
            type="email"
            v-model="email"
            label="E-Mail"
            class="mt-10"
            autofocus
            autocapitalize="off"
          />
          <text-input
            type="password"
            v-model="password"
            class="mt-6"
            label="Password"
          />
        </div>
        <div class="px-10 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-between items-center">
          <button
            type="submit"
            class="w-full bg-orange-500 p-2 rounded text-white"
          >
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import TextInput from '@/components/Molecules/TextInput.vue'; // @ is an alias to /src

@Component({
  components: {
    TextInput
  },
})
export default class Login extends Vue {
  private email: string | null = null
  private password: string | null = null
  
  onSubmit({ target }: {target: HTMLButtonElement }) {
    console.log(target.getBoundingClientRect())
  }
}
</script>
