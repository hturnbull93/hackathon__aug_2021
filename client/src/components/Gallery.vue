<template>
  <section class="image-gallery">
    <a
      v-for="image of imagesGallery"
      :key="image.url"
      :href="image.url"
      class="image-gallery__link"
    >
      <img
        :src="image.src"
        :alt="image.alt"
        class="image-gallery__image"
        width="200"
        height="200"
      />
    </a>
  </section>

  <Pagination
    :current="currentPage"
    :max="pageCount"
    @previous-page="previousPage"
    @next-page="nextPage"
  />
</template>

<script>
import Pagination from "@/components/Pagination.vue";

export default {
  pageSize: 12,
  props: ["images"],
  data() {
    return {
      currentPage: 0,
    };
  },
  components: {
    Pagination,
  },
  computed: {
    imageCount() {
      return this.images.length;
    },
    pageCount() {
      const { images } = this;
      const { pageSize } = this.$options;

      return Math.floor((images.length - 1) / pageSize);
    },
    imagesGallery() {
      const { images, currentPage } = this;
      const { pageSize } = this.$options;

      // Starting/ending images
      const startImage = currentPage * pageSize;

      // Return mapped images
      return images
        .map((img) => ({
          url: img.url,
          src: img.src,
          alt:
            img.description &&
            img.description.substring(0, 100) + img.description.length > 100
              ? "..."
              : "",
        }))
        .splice(startImage, pageSize);
    },
  },
  methods: {
    previousPage() {
      const { currentPage } = this;

      // Update current page
      this.currentPage = Math.max(currentPage - 1, 0);

      // Scroll back to top
      this.scrollUp();
    },
    nextPage() {
      const { currentPage, imageCount } = this;

      // Update current page
      this.currentPage = Math.min(currentPage + 1, imageCount - 1);

      // Scroll back to top
      this.scrollUp();
    },
    scrollUp() {
      window.scrollTo(0, 0);
    },
  },
};
</script>

<style lang="scss">
.image-gallery {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: var(--size-75);

  @media (min-width: 400px) {
    grid-template-columns: repeat(3, 1fr);
  }

  @media (min-width: 500px) {
    grid-template-columns: repeat(4, 1fr);
  }

  &__link {
    display: block;
    transition: box-shadow 0.15s, transform 0.15s;
    border-radius: var(--size-50);
    overflow: hidden;

    &:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 20px -5px rgba(black, 0.15);
    }
  }

  &__image {
    display: block;
    width: 100%;
    height: auto;
    aspect-ratio: 1 / 1;
    background: var(--grey-100);
    object-fit: cover;
  }
}
</style>