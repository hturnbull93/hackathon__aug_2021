import Homepage from "../views/Homepage.vue";
import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
  {
    path: "/",
    name: "Welcome",
    component: Homepage
  },
  {
    path: "/upload",
    name: "Upload Image",
    component: () => import("@/views/Upload.vue")
  },
  {
    path: "/edit",
    name: "Edit Image",
    component: () => import("@/views/Edit.vue")
  },
  {
    path: "/search",
    name: "Edit Image",
    component: () => import("@/views/Search.vue")
  },
  {
    path: "/account",
    name: "Edit Image",
    component: () => import("@/views/Account.vue")
  },
  {
    path: "/authenticate",
    name: "Edit Image",
    component: () => import("@/views/Authenticate.vue")
  },
  {
    path: "/login",
    name: "Log in",
    component: () => import("@/views/Login.vue"),
    beforeEnter(to, from, next) {
      const authenticated = true;

      /**
       *  @todo
       *  Add some sort of actual authentication here
       *
       */

      if (authenticated) {
        next();
      } else {
        next({
          path: "/"
        });
      }
    }
  }
];

const router = createRouter({
  history: createWebHashHistory(),
  mode: "history",
  base: "/",
  routes
});

export default router;
