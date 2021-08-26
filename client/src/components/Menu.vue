<template>
  <div class="menu">
    <button
      class="menu__toggle"
      :class="{ 'menu__toggle--expanded': !hidden }"
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
            <SvgIcon name="img" title="Image icon" class="menu-button__icon" />
            Upload image
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--spaced">
          <router-link class="menu-button" to="/" title="Back to homepage">
            Home
          </router-link>
        </li>
        <li class="menu__dropdown__listitem menu__dropdown__listitem--border">
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
import SvgIcon from "@/components/SvgIcon.vue";

export default {
  name: "",
  props: ["loggedin", "user"],
  components: {
    SvgIcon
  },
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
  },
  watch: {
    $route() {
      if (!this.hidden) this.hidden = true;
    }
  }
};
</script>

<style lang="scss">
$menu-burger-speed: 0.15s;
$menu-link-speed: 0.3s cubic-bezier(0, 0.86, 0.46, 0.93);

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
      top: 50%;
      transition: opacity $menu-burger-speed, transform $menu-burger-speed,
        width $menu-burger-speed;

      &--1 {
        transform: translateY(-9px);
      }

      &--2 {
        transform: translate(8px, -1px);
        width: 16px;
      }

      &--3 {
        transform: translate(2px, 7px);
        width: 12px;
      }
    }

    &--expanded &__row--1 {
      transform: rotate(45deg);
      width: 22px;
    }

    &--expanded &__row--2 {
      transform: rotate(-45deg);
      width: 22px;
    }

    &--expanded &__row--3 {
      transform: translate(-20px, 7px);
      opacity: 0;
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
    animation: fadeMenuDown $menu-link-speed;

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
      animation: fadeMenuDown $menu-link-speed;
      animation-fill-mode: backwards;

      @for $i from 1 through 7 {
        &:nth-child(#{$i}) {
          animation-delay: #{$i * 30}ms;
        }
      }

      &--border {
        border-top: 1px solid var(--grey-100);
      }

      &--spaced {
        margin-top: var(--size-25);
      }
    }
  }
}

@keyframes fadeMenuDown {
  from {
    opacity: 0;
    transform: translateY(10px);
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
  min-width: 160px;
  transition: background-color 0.15s;

  &.router-link-exact-active {
    color: var(--grey-200);
    pointer-events: none;
  }

  &__icon {
    display: block;
    width: var(--size-100);
    height: var(--size-100);
    margin: 0 var(--size-50) 0 0;
    color: var(--primary-100);
  }

  &:hover {
    color: var(--grey-500);
    text-decoration: none;
  }

  &--blue {
    background: var(--primary-200);
    color: white;
    border-radius: var(--size-50);
    padding: var(--size-75) var(--size-100);

    &:hover {
      background: var(--primary-300);
      color: white;
    }

    &.router-link-exact-active {
      background: var(--grey-100);
      color: var(--grey-300);
    }
  }

  &--blue.router-link-exact-active &__icon {
    color: var(--grey-200);
  }
}
</style>