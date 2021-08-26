<template>
  <main class="app">
    <header class="app__header">
      <router-link to="/" title="Back to homepage">
        <img
          class="app__logo"
          src="@/assets/images/logo.svg"
          alt="Intechgram logo"
        />
      </router-link>

      <Menu />
    </header>

    <router-view />
  </main>
</template>

<script>
import Menu from "@/components/Menu.vue";

export default {
  name: "App",
  components: {
    Menu
  },
  mounted() {
    this.$store.dispatch("updateImages");
  }
};
</script>

<style lang="scss">
@import "@/assets/style/main.scss";

.app {
  padding: var(--size-100);
  max-width: 768px;
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
}
</style>