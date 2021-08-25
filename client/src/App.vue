<template>
  <main class="app">
    <header class="app__header">
      <a href="/" title="Back to homepage">
        <img
          class="app__logo"
          src="@/assets/images/logo.svg"
          alt="Intechgram logo"
        />
      </a>

      <button class="app__menu-toggle">
        <div role="img" alt="Burger icon">
          <span class="app__menu-toggle__row app__menu-toggle__row--1"></span>
          <span class="app__menu-toggle__row app__menu-toggle__row--2"></span>
          <span class="app__menu-toggle__row app__menu-toggle__row--3"></span>
        </div>
      </button>
    </header>

    <router-view />
  </main>
</template>

<script>
export default {
  name: "App",
};
</script>

<style lang="scss">
@import "@/assets/style/main.scss";

.app {
  padding: var(--size-100);
  max-width: 600px;
  margin: 0 auto;

  &__header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0 0 var(--size-100);
  }

  &__logo {
    display: block;
    width: var(--size-200);
    height: auto;
    margin: 0;
  }

  &__menu-toggle {
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
      width: 24px;
      height: 3px;
      background: var(--grey-400);
      border-radius: 2px;

      &--1 {
        top: calc(50% - 10px);
      }

      &--2 {
        top: calc(50% - 1px);
        width: 18px;
        left: 14px;
      }

      &--3 {
        top: calc(50% + 8px);
        width: 14px;
        left: 10px;
      }
    }
  }
}
</style>