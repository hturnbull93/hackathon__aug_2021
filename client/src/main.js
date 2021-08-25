import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

import DropZone from "dropzone-vue";
import "dropzone-vue/dist/dropzone-vue.common.css";

const app = createApp(App);

app.use(DropZone);
app.use(router);

app.mount("#app");
