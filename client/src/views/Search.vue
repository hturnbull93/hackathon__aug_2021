<template>
  <section class="page page--search">
    <form>
      <input type="search" placeholder="Search" />
      <button>Search</button>
    </form>
    <Gallery :images="mockImages" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";

import mockImages from "@/assets/mock/images.js";

export default {
  name: "Search",
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
