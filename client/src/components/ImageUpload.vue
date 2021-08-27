<template>
  <div class="uploader">
    <img :src="previewImage" class="uploading-image" />
    <input type="file" name="file" accept="image/*" @change="uploadImage" />
  </div>
</template>

<script>
const caculateDimensions = (img) => {
  const MAX_WIDTH = img.width > img.height ? 1280 : 720;
  const MAX_HEIGHT = img.width > img.height ? 720 : 1280;

  let width = img.width;
  let height = img.height;

  if (width > height) {
    if (width > MAX_WIDTH) {
      height = height * (MAX_WIDTH / width);
      width = MAX_WIDTH;
    }
  } else {
    if (height > MAX_HEIGHT) {
      width = width * (MAX_HEIGHT / height);
      height = MAX_HEIGHT;
    }
  }
  return { width, height };
};

export default {
  name: "imageUpload",
  data() {
    return {
      previewImage: null,
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

          this.previewImage = dataurl;
          this.$emit("image-uploaded", dataurl);
        };
        img.src = readEvent.target.result;
      };
      reader.readAsDataURL(imageFile);
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
