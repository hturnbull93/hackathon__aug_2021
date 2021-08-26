<template>
  <section v-if="!images.length" class="is-empty-notice">
    <p class="is-empty-notice__text">No images exist here yet :(</p>
    <p class="is-empty-notice__text is-empty-notice__text--small">P.S. why don't you <router-link to="/upload/" title="Upload image">upload the first</router-link>?</p>
  </section>
  
  <section v-else class="image-gallery">
    <router-link
      v-for="image of imagesGallery"
      :key="image.url"
      :to="image.url"
      class="image-gallery__link"
    >
      <img
        :src="image.src"
        :alt="image.alt"
        class="image-gallery__image"
        width="200"
        height="200"
      />
    </router-link>
  </section>

  <Pagination
    v-if="pageCount > 1"
    :current="currentPage"
    :max="pageCount"
    @previous-page="previousPage"
    @next-page="nextPage"
  />
</template>

<script>
import Pagination from "@/components/Pagination.vue";
import truncateString from "@/assets/scripts/truncate-string.js";

export default {
  pageSize: 12,
  props: ["images"],
  data() {
    return {
      currentPage: 0
    };
  },
  components: {
    Pagination
  },
  computed: {
    imageCount() {
      return this.images.length;
    },
    pageCount() {
      const { images } = this;
      const { pageSize } = this.$options;

      return images.length > 1 ? Math.floor((images.length - 1) / pageSize) : 0;
    },
    imagesGallery() {
      const { images, currentPage } = this;
      const { pageSize } = this.$options;

      // Starting/ending images
      const startImage = currentPage * pageSize;

      // Return mapped images
      return images
        .map(img => ({
          url: `/view-image/${img.imageId}/`,
          src: img.src,
          alt: truncateString(img.alt, 35)
        }))
        .splice(startImage, pageSize);
    }
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
    }
  }
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

  @media (min-width: 550px) {
    grid-template-columns: repeat(4, 1fr);
  }

  @media (min-width: 700px) {
    grid-template-columns: repeat(5, 1fr);
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