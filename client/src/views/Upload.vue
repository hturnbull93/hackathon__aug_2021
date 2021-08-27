<template>
  <section class="page page--upload">
    <ImageUpload @image-uploaded="onImageUpload" />
    <ImageEdit />
  </section>
</template>

<script>
import ImageUpload from "../components/ImageUpload.vue";
import ImageEdit from "../components/ImageEdit.vue";
export default {
  name: "Upload",
  data() {},
  components: {
    ImageUpload,
    ImageEdit,
  },
  methods: {
    onImageUpload(dataurl) {
      console.log("typeof dataurl :>> ", typeof dataurl);
      console.log("got dataurl");
    },
    onImageEditFormSubmit(image) {
      console.log("typeof image :>> ", typeof image);
      // send image to api
      // add response to store so you can see it
    },
  },
};
</script>
