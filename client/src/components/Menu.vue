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
          <router-link
            class="menu-button menu-button--blue"
            to="/upload/"
            title="Upload a new image"
          >
            Upload image
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--spaced">
          <router-link class="menu-button" to="/search/" title="Search images">
            Search
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
          <router-link
            class="menu-button"
            :to="`/search/${user}/`"
            title="View your images"
          >
            Your images
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
          <router-link class="menu-button" to="/search/" title="Search images">
            Favourites
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
          <router-link class="menu-button" to="/logout/" title="Log out">Log out</router-link>
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
      hidden: true
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
    }
  },
  mounted() {
    window.addEventListener("click", this.closeMenuOnClickOutside);
  },
  beforeUnmount() {
    window.removeEventListener("click", this.closeMenuOnClickOutside);
  }
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
    cursor: pointer;

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
    top: calc(100% + var(--size-50));
    right: 0;
    width: fit-content;
    background: var(--white-100);
    padding: var(--size-75) var(--size-75) var(--size-25);
    border-radius: var(--size-75);
    box-shadow: 0 10px 40px -5px rgba(black, 0.15);
    z-index: 3;

    &::after {
      content: "";
      position: absolute;
      width: 10px;
      height: 10px;
      background: var(--white-100);
      border-top-left-radius: 2px;
      position: absolute;
      top: 0;
      right: 0;
      transform: rotate(45deg) translate(-16px, 8px);
    }

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
  padding: var(--size-50) var(--size-100);
  font-size: 0.9em;
  font-weight: 400;
  color: var(--grey-500);
  cursor: pointer;
  min-width: 140px;
  transition: background-color 0.15s;

  &:hover {
    color: var(--grey-500);
    text-decoration: none;
  }

  &--blue {
    background: var(--primary-100);
    color: var(--white-100);
    border-radius: var(--size-50);
    padding: var(--size-75) var(--size-100);

    &:hover {
      background: var(--primary-200);
      color: var(--white-100);
    }
  }
}
</style>