<template>
  <svg xmlns="http://www.w3.org/2000/svg">
    <title v-if="title">{{ title }}</title>
    <use :href="iconPath" xmlns:xlink="http://www.w3.org/1999/xlink" />
  </svg>
</template>

<script>
export default {
  name: "SvgIcon",
  props: {
    name: {
      type: String,
      required: true
    },
    title: {
      type: String,
      default: null
    }
  },
  computed: {
    iconPath() {
      let icon = require(`@/assets/sprites/${this.name}.svg`);

      if (Object.prototype.hasOwnProperty.call(icon, "default")) {
        icon = icon.default;
      }

      return icon.url;
    }
  }
};
</script>
