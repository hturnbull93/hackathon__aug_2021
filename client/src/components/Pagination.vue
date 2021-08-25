<template>
  <div class="pagination">
    <button
      class="pagination__button pagination__button--previous"
      :disabled="current === 0"
      @click.prevent="goPrevious"
    >
      &larr;
    </button>

    <p class="pagination__number">Page {{ current + 1 }} of {{ max + 1 }}</p>

    <button
      class="pagination__button pagination__button--next"
      :disabled="current === max"
      @click.prevent="goNext"
    >
      &rarr;
    </button>
  </div>
</template>

<script>
export default {
  props: ["current", "max"],
  methods: {
    goPrevious() {
      const { current } = this;

      this.$emit("previous-page", Math.max(current - 1, 0));
    },
    goNext() {
      const { max, current } = this;

      this.$emit("next-page", Math.min(current + 1, max - 1));
    }
  }
};
</script>

<style lang="scss">
.pagination {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin: var(--size-100) 0 0;
  color: var(--grey-300);
  font-size: 0.9em;

  &__number {
    font-size: var(--size-75);
  }

  &__button {
    font: inherit;
    padding: var(--size-50);
    line-height: 1em;
    font-size: var(--size-125);
    border: 0;
    margin: 0;
    cursor: pointer;
    background: transparent;
    color: var(--grey-600);
    transition: color 0.15s;
    background: var(--grey-100);
    border-radius: var(--size-50);

    &:hover {
      color: var(--primary-100);
    }

    &[disabled] {
      color: var(--grey-200);
      background: transparent;
    }
  }
}
</style>