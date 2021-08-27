<template>
  <form class="search" @submit.prevent="searchImages">
    <input type="search" placeholder="Search" ref="searchInput" class="search__input" list="tags" />
    <button class="[ search__button ] [ button ]" aria-label="Search">
      <SvgIcon name="search" title="Search" class="search__button__icon" />
    </button>

    <datalist id="tags">
      <option v-for="tag of tags" :key="tag" :value="tag"/>
    </datalist>
  </form>
</template>

<script>
import SvgIcon from "@/components/SvgIcon.vue";
import { mapState } from "vuex";

export default {
  name: "SearchForm",
  components: {
    SvgIcon
  },
  computed: mapState({
    tags: state => state.tags
  }),
  methods: {
    searchImages() {
      const { searchInput } = this.$refs;

      this.$emit("search-images", searchInput.value);
    }
  }
};
</script>

<style lang="scss">
.search {
  position: relative;
  margin: 0 0 var(--size-100);

  &__input {
    font: inherit;
    line-height: 1.2em;
    border-radius: var(--size-50);
    width: 100%;
    padding: var(--size-75) var(--size-100);
    padding-right: var(--size-300);
    background: var(--white-100);
    border: 0;
    box-shadow: 0 5px 20px -8px rgba(black, 0.1);
  }

  &__button {
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    display: flex;
    align-items: center;
    padding: 0 var(--size-75);
    background: transparent;
    color: var(--grey-300);
    cursor: pointer;

    &:hover {
      background: transparent;
      color: var(--grey-500);
    }

    &__icon {
      width: var(--size-125);
      height: var(--size-125);
    }
  }
}
</style>