<template>
  <section class="page page--homepage">
    <Gallery :loading="loading" :images="mockImages" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";
import axios from "axios";

import mockImages from "@/assets/mock/images.js";

export default {
  name: "Homepage",
  components: {
    Gallery,
  },
  data() {
    return {
      mockImages,
      images: [],
      loading: true,
    };
  },
  mounted() {
    this.images = axios
      .get(":8081/api/data/")
      .then((e) => e.json())
      .then((results) => {
        this.loading = false;

        return results;
      })
      .catch((e) => console.error(e));
  },
};
</script>
