<template>
  <section v-if="!image" class="is-empty-notice">
    <p class="is-empty-notice__text">
      No matching image
    </p>
  </section>

  <section v-else class="image">
    <figure class="image__figure">
      <img :src="image.src" :alt="imageAlt" class="image__src" />
      <figcaption class="image__figcaption">
        Uploaded by {{ image.uploader || '' }}
      </figcaption>
    </figure>

    <h1 class="image__title">Image description</h1>
    <p class="image__description">{{image.alt}}</p>

    <ul class="image__tags">
      <li class="image__tags__listitem">
        {{image.tags}}
      </li>
    </ul>
  </section>
</template>

<script>
import { mapState } from "vuex";
import truncateString from "@/assets/scripts/truncate-string.js";

export default {
  name: "Image",
  props: ["imageId"],
  computed: {
    ...mapState({
      images: state => state.images
    }),
    image() {
      const match = this.images.find(img => img.imageId === this.imageId);

      // Set image defaults
      const imageDefaults = { uploader: "Anonymous User" };

      // Return
      return match && { ...imageDefaults, ...match };
    },
    imageAlt() {
      return truncateString(this.image?.alt);
    }
  }
};
</script>

<style lang="scss">
.image {
  &__figure {
    display: block;
    padding: 0;
    margin: 0 0 var(--size-100);
  }

  &__figcaption {
    display: block;
    color: var(--grey-500);
    font-size: var(--size-75);
    line-height: 1.2em;
    padding: var(--size-50) 0;
  }

  &__src {
    display: block;
    width: 100%;
    max-height: calc(100vh - var(--size-300));
    object-fit: contain;
    background: var(--grey-100);
    border-radius: var(--size-50);
  }

  &__title {
    font-size: var(--size-125);
    font-weight: 600;
    margin: 0 0 var(--size-25);
  }

  &__description {
    margin: 0;
  }
}
</style>