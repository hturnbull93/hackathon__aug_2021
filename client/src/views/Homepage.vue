<template>
  <section class="page page--homepage">
    <Gallery :images="mockImages" />
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
};
</script>
