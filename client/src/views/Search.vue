<template>
  <section class="page page--search">
    <SearchForm @search-images="searchImages" /> 
    <Gallery :loading="loading" :images="filteredImages" />
  </section>
</template>

<script>
import SearchForm from "@/components/SearchForm.vue";
import Gallery from "@/components/Gallery.vue";
import { mapState } from "vuex";

export default {
  name: "Search",
  components: {
    Gallery,
    SearchForm
  },
  computed: {
    ...mapState({
      images: state => state.images,
      loading: state => state.loading
    }),
    filteredImages() {
      const { images } = this;
      const { query } = this.$route.params;

      // If no search params, return all images
      if (!query) return images;

      // Else filter
      return images.filter(
        ({ tags }) =>
          !tags.localeCompare(query, undefined, {
            ignorePunctuation: true,
            sensitivity: "base"
          })
      );
    }
  },
  methods: {
    searchImages(query) {
      this.$router.push(`/search/${query}`);
    }
  }
};
</script>
