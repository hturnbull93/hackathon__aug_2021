<template>
  <section class="page page--view-image">
    IMAGE {{image}}
  </section>
</template>

<script>
import axios from "axios";

export default {
  name: "ViewImage",
  data() {
    return {
      image: null
    };
  },
  mounted() {
    const { image } = this.$route.params;

    this.image = axios
      .get(`/api/data/image/${image}`)
      .then(e => e.json())
      .then(([result]) => result);
  }
};
</script>
