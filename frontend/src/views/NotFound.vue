<template>
  <div class="p-6 bg-gray-200 min-h-screen flex justify-center items-center">
    <div class="lg:w-1/2 p-4">
      <svg-image name="page_not_found" alt="Not Found" class="w-full" />
      <router-link
        to="/"
        class="block w-full bg-orange-500 mt-5 p-2 rounded text-white text-center text-2xl router-link-active"
      >
        Home
      </router-link>
    </div>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
import SvgImage from '@/components/Atoms/SvgImage.vue'; // @ is an alias to /src

@Component({
  components: {
    SvgImage,
  },
})
export default class NotFound extends Vue {}
</script>
