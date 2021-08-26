<template>
  <div class="image">
    {{image}}
  </div>
</template>

<script>
import { mapState } from "vuex";

export default {
  name: "Image",
  props: ["imageId"],
  computed: mapState({
    image: state => state.images.find(img => img.imageId === this.imageId)
  })
};
</script>