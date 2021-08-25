<template>
  <section class="page page--search">
    <form class="search" @submit.prevent="searchImages">
      <input type="search" placeholder="Search" ref="searchInput" />
      <button>Search</button>
    </form>
    <Gallery :images="filteredImages" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";
import { mapState } from "vuex";

export default {
  name: "Search",
  components: {
    Gallery
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
    searchImages() {
      const { searchInput } = this.$refs;

      // Get value from search input
      const query = searchInput.value;

      // Update URL
      this.$router.push(`/search/${query}`);
    }
  }
};
</script>

<style lang="scss">
.search {
  display: flex;
  margin: 0 0 var(--size-100);
}
</style>
