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
            :errors="emailErrors"
          />
          <text-input
            type="password"
            v-model="password"
            class="mt-6"
            label="Password"
            :errors="passwordErrors"
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
import { namespace } from 'vuex-class';
import { LoginState } from '@/store/types';
import TextInput from '@/components/Molecules/TextInput.vue';

const AuthModule = namespace('auth');

@Component({
  components: {
    TextInput,
  },
})
export default class LoginView extends Vue {
  private email: string = '';
  private password: string = '';

  private emailErrors: Array<any> = [];
  private passwordErrors: Array<any> = [];

  @AuthModule.Action('login')
  private login!: (loginState: LoginState) => Promise<any>;


  private onSubmit() {
    const loginState: LoginState = {email: this.email, password: this.password};
    this.login(loginState)
      .then(e => {
        this.$router.push('/');
      })
      .catch(err => {
        const response = err.response;
        const errors = response.data.errors;
        if (errors) {
          this.emailErrors = errors.email;
          this.passwordErrors = errors.password;
        }
      })
    ;
  }
}
</script>
