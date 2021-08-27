<template>
  <main class="app">
    <header class="app__header">
      <router-link to="/" title="Back to homepage">
        <SvgIcon
          class="app__logo"
          name="logo"
          title="Intechgram logo"
        />
      </router-link>

      <Menu />
    </header>

    <div class="app__content">
      <router-view />
    </div>
  </main>
</template>

<script>
import Menu from "@/components/Menu.vue";
import SvgIcon from "@/components/SvgIcon.vue";

export default {
  name: "App",
  components: {
    Menu,
    SvgIcon
  },
  mounted() {
    this.$store.dispatch("updateImages");

    // setInterval(() => {
    //   this.$store.dispatch("updateImages");
    // }, 10000);
  }
};
</script>

<style lang="scss">
@import "@/assets/style/main.scss";

.app {
  max-width: 768px;
  margin: 0 auto;

  &__header {
    position: sticky;
    top: 0;
    z-index: 2;
    background: var(--white-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: var(--size-100) var(--size-100) var(--size-75);

    @supports (backdrop-filter: blur(15px)) {
      background: transparent;
      backdrop-filter: blur(15px) brightness(110%);
    }
  }

  &__logo {
    display: block;
    width: var(--size-200);
    height: var(--size-200);
    color: var(--primary-200);
    margin: 0;
  }

  &__content {
    padding: var(--size-100);
  }
}
</style>