<template>
  <section class="page page--search">
    <SearchForm @search-images="searchImages" /> 
    <Gallery :images="filteredImages" />
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
      const { search } = this.$route.params;

      console.log("Search by", search);

      // If no search params, return all images
      if (!search) return images;

      // Else filter
      return images.filter(img => {
        // Perform filter here

        return img;
      });
    }
  },
  methods: {
    searchImages(query) {
      this.$router.push(`/search/${query}`);
    }
  }
};
</script>
