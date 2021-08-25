<template>
  <section class="page page--search">
    <form class="search">
      <input type="search" placeholder="Search" />
      <button>Search</button>
    </form>
    <Gallery :images="images" />
  </section>
</template>

<script>
import Gallery from "@/components/Gallery.vue";

export default {
  name: "Search",
  components: {
    Gallery,
  },
  data() {
    return {
      images: [],
      search: "",
      loading: true,
    };
  },
  mounted() {
    this.images = axios
      .get(":8081/api/data/")
      .then((e) => e.json())
      .then((results) => {
        this.loading = false;

        return results;
      });
  },
  computed: {
    filteredImages() {
      const { search, images } = this;

      return images;
    },
  },
};
</script>

<style lang="scss">
.search {
  display: flex;
  margin: 0 0 var(--size-100);
}
</style>
