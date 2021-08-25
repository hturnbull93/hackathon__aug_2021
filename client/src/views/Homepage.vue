<template>
  <section class="page page--homepage">
    <Gallery :loading="loading" :images="images" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";
import { mapState } from "vuex";

export default {
  name: "Homepage",
  components: {
    Gallery
  },
  computed: mapState({
    images: state => state.images,
    loading: state => state.loading
  })
};
</script>
