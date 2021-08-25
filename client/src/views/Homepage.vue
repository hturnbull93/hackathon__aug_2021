<template>
  <section class="page page--homepage">
    <Gallery :loading="loading" :images="images" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";
import axios from "axios";

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

        this.images = images;
      })
      .catch(e => console.error(e));
  }
};
</script>
