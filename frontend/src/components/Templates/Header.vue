<template>
  <header>
    <div class="w-full">
      <nav class="flex items-center justify-between flex-wrap px-6 p-3 bg-white shadow">
        <div class="flex items-center flex-shrink-0 mr-6">
          <router-link
            to="/"
            class="lg:mr-6"
          >
            <logo class="text-gray-800" />
          </router-link>
        </div>
        <div class="flex items-center">
          <a
            href="#"
            @click.prevent="onClickLogout"
          >
            <icon class="w-6 h-6 text-gray-800 fill-current" name="logout" />
          </a>
        </div>
      </nav>
    </div>
  </header>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import { namespace } from 'vuex-class';
import Logo from '@/components/Atoms/Logo.vue';
import Icon from '@/components/Atoms/Icon.vue';

const AuthModule = namespace('auth');

@Component({
  components: {
    Logo,
    Icon
  },
})
export default class Header extends Vue {
  @AuthModule.Action('logout')
  private logout!: () => Promise<any>;

  private onClickLogout() {
    this.logout()
      .then(e => {
        this.$router.push('/login');
      })
    ;
  }
};
</script>
