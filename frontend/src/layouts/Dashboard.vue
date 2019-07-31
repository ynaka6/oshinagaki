<template>
  <div>
    <div class="flex flex-col">
      <div class="min-h-screen flex flex-col bg-gray-200">
        <Header />
        <div class="flex flex-grow">
          <div
            class="w-full overflow-hidden px-2 py-8 lg:px-12 lg:py-12"
          >
            <router-view></router-view>
          </div>
        </div>
        <Footer />
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator';
import Header from '@/components/Templates/Header.vue';
import Footer from '@/components/Templates/Footer.vue';

@Component({
  components: {
    Header,
    Footer,
  },
})
export default class DashbordLayout extends Vue {};
</script>
