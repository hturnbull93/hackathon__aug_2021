<template>
  <section class="page page--homepage">
    <Gallery :loading="loading" :images="images" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";
import axios from "axios";

import mockImages from "@/assets/mock/images.js";

export default {
  name: "Homepage",
  components: {
    Gallery
  },
  data() {
    return {
      images: [],
      loading: true
    };
  },
  mounted() {
    axios
      .get("/api/data/")
      .then(({ data }) => data.result)
      .then(({ images = [] }) => {
        this.loading = false;

        // this.images = images;
        console.log(mockImages);
        console.log(images);

        this.images = mockImages;
      })
      .catch(e => {
        this.images = mockImages;

        console.error(e);
      });
  }
};
</script>
