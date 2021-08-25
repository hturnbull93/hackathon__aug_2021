<template>
  <section class="page page--homepage">
    <Gallery :images="mockImageSearched" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";

import mockImages from "@/assets/mock/images.js";

export default {
  name: "Homepage",
  components: {
    Gallery,
  },
  data() {
    return {
      mockImages,
    };
  },
  computed: {
    mockImageSearched() {
      return this.mockImages.filter(() => true);
    },
  },
};
</script>
