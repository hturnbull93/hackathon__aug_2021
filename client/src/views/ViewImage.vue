<template>
  <section class="page page--view-image">
    <Image :image-id="image" />
  </section>
</template>

<script>
import Image from "@/components/Image.vue";

export default {
  name: "ViewImage",
  components: {
    Image
  },
  data() {
    const { image } = this.$route.params;

    return { image };
  }
};
</script>
