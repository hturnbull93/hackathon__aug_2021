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
  pageSize: 24,
  props: ["images"],
  data() {
    return {
      currentPage: 1
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

      return images.length > 1 ? Math.ceil(images.length / pageSize) : 1;
    },
    imagesGallery() {
      const { images, currentPage } = this;
      const { pageSize } = this.$options;

      // Starting/ending images
      const startImage = (currentPage - 1) * pageSize;

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
      this.currentPage = Math.max(currentPage - 1, 1);

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
  grid-template-columns: repeat(3, 1fr);
  grid-auto-flow: row dense;
  grid-gap: var(--size-25);

  @media (min-width: 400px) {
    grid-template-columns: repeat(4, 1fr);
  }

  @media (min-width: 550px) {
    grid-template-columns: repeat(5, 1fr);
  }

  @media (min-width: 700px) {
    grid-template-columns: repeat(6, 1fr);
  }

  &__link {
    display: block;
    transition: box-shadow 0.15s, transform 0.15s;
    overflow: hidden;
    border-radius: var(--size-50);

    @media (max-width: 399px) {
      &:nth-child(5n - 3) {
        grid-row: span 2;
        grid-column: span 2;
      }
    }

    @media (min-width: 400px) and (max-width: 549px) {
      &:nth-child(1),
      &:nth-child(7),
      &:nth-child(17),
      &:nth-child(18) {
        grid-row: span 2;
        grid-column: span 2;
      }
    }

    @media (min-width: 550px) and (max-width: 699px) {
      &:nth-child(1),
      &:nth-child(6),
      &:nth-child(10),
      &:nth-child(16) {
        grid-row: span 2;
        grid-column: span 2;
      }
      &:nth-child(13) {
        grid-row: span 3;
        grid-column: span 3;
      }
    }

    @media (min-width: 700px) {
      &:nth-child(1),
      &:nth-child(8),
      &:nth-child(10),
      &:nth-child(13) {
        grid-row: span 2;
        grid-column: span 2;
      }
    }

    &:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 20px -5px var(--box-shadow-200);
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