<template>
  <div class="uploader">
    <img :src="previewImage" class="uploading-image" />
    <input type="file" name="file" accept="image/*" @change="uploadImage" />
    <label for="description"> Description </label>
    <input
      v-model="description"
      type="text"
      name="description"
      id="description"
    />
    <label for="tags"> Tags </label>
    <input v-model="tags" type="text" name="tags" id="tags" />
    <input type="submit" @click="submit" value="submit" />
  </div>
</template>

<script>
import axios from "axios";
import caculateDimensions from "@/assets/scripts/calculate-dimensions.js";
//import router from "../router";

export default {
  name: "ImageSubmissionForm",
  data() {
    return {
      previewImage: null,
      resizedImage: null,
      description: "",
      tags: "",
    };
  },
  methods: {
    uploadImage(e) {
      const imageFile = e.target.files[0];
      const reader = new FileReader();
      reader.onload = (readEvent) => {
        const img = document.createElement("img");
        img.onload = () => {
          const canvas = document.createElement("canvas");
          const ctx = canvas.getContext("2d");

          const { width, height } = caculateDimensions(img);

          canvas.width = width;
          canvas.height = height;

          ctx.drawImage(img, 0, 0, width, height);
          const dataurl = canvas.toDataURL(imageFile.type, 0.5);

          this.resizedImage = dataurl;
          this.previewImage = dataurl;
        };
        img.src = readEvent.target.result;
      };
      reader.readAsDataURL(imageFile);
    },
    submit() {
      const imageData = new FormData();

      imageData.append("file", this.resizedImage);
      imageData.append("description", this.description);
      imageData.append("tags", this.tags);
      imageData.append("user", "Capt. Uploader");

      axios({
        method: "post",
        url: "/api/upload/",
        data: imageData,
        headers: {
          "Content-Type": "multipart/form-data",
        },
      }).then((e) => {
        if (e.status === 200) {
          this.$store.dispatch("addLocalImage", e.imageData);
          console.log("e :>> ", e);
        }
        //router.push("/");
      });
    },
  },
};
</script>


<style lang="scss" scoped>
.uploading-image {
  display: flex;
  width: 100%;
}
.uploader {
  display: flex;
  flex-direction: column;
}
</style>
