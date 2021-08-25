<template>
  <section class="page page--upload">
    <Uploader></Uploader>
  </section>
</template>

<script>
import Uploader from "../components/Uploader.vue";
export default {
  name: "Upload",
  components: {
    Uploader,
  },
};
</script>
