<template>
  <div class="menu">
    <button
      class="menu__toggle"
      @click.prevent="toggleMenu"
      aria-label="Toggle menu"
    >
      <div role="img" alt="Burger icon">
        <span class="menu__toggle__row menu__toggle__row--1"></span>
        <span class="menu__toggle__row menu__toggle__row--2"></span>
        <span class="menu__toggle__row menu__toggle__row--3"></span>
      </div>
    </button>

    <nav class="menu__dropdown" :hidden="hidden">
      <ul class="menu__dropdown__list">
        <li class="menu__dropdown__listitem">
          <a
            class="menu-button menu-button--blue"
            href="/upload/"
            title="Upload a new image"
          >
            Upload image
          </a>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--spaced">
          <a class="menu-button" href="/search/" title="Search images">
            Search
          </a>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
          <a
            class="menu-button"
            :href="`/search/${user}/`"
            title="View your images"
          >
            Your images
          </a>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
          <a class="menu-button" href="/logout/" title="Log out">Log out</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  name: "",
  props: ["loggedin", "user"],
  data() {
    return {
      hidden: true,
    };
  },
  methods: {
    toggleMenu() {
      this.hidden = !this.hidden;
    },
    closeMenuOnClickOutside({ target }) {
      if (this.hidden) return;

      // Check if click is outside
      const clickedInside = this.$el.contains(target);

      // If not clicked inside, close
      if (!clickedInside) this.hidden = true;
    },
  },
  mounted() {
    window.addEventListener("click", this.closeMenuOnClickOutside);
  },
  beforeUnmount() {
    window.removeEventListener("click", this.closeMenuOnClickOutside);
  },
};
</script>

<style lang="scss">
.menu {
  position: relative;

  &__toggle {
    width: 40px;
    height: 40px;
    padding: 0;
    background: transparent;
    margin: 0;
    position: relative;
    border: 0;

    &__row {
      position: absolute;
      left: 8px;
      width: 22px;
      height: 3px;
      background: var(--grey-400);
      border-radius: 2px;

      &--1 {
        top: calc(50% - 9px);
      }

      &--2 {
        top: calc(50% - 1px);
        width: 16px;
        left: 16px;
      }

      &--3 {
        top: calc(50% + 7px);
        width: 12px;
        left: 10px;
      }
    }
  }

  &__dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    width: fit-content;
    background: var(--white-100);
    padding: var(--size-75);
    border-radius: var(--size-75);
    box-shadow: 0 10px 40px -5px rgba(black, 0.15);

    &[hidden] {
      display: none;
    }

    &__list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    &__listitem {
      &--border {
        border-top: 1px solid var(--grey-100);
      }

      &--spaced {
        margin-top: var(--size-25);
      }
    }
  }
}

.menu-button {
  display: flex;
  line-height: 1.2em;
  white-space: nowrap;
  text-decoration: none;
  padding: var(--size-50);
  font-size: 0.9em;
  font-weight: 400;
  color: var(--grey-500);
  cursor: pointer;

  &--blue {
    background: var(--primary-100);
    color: var(--white-100);
    border-radius: var(--size-50);
    padding: var(--size-75) var(--size-100);
  }
}
</style>