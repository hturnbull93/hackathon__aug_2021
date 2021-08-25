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
    path: "/view-image/",
    redirect: "/"
  },
  {
    path: "/view-image/:image",
    name: "View Image",
    component: () => import("@/views/ViewImage.vue")
  },
  {
    path: "/search",
    name: "Search",
    component: () => import("@/views/Search.vue")
  },
  {
    path: "/search/:search",
    name: "Search Results",
    component: () => import("@/views/Search.vue")
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
  },
  {
    path: "/logout",
    name: "Log in",
    component: () => import("@/views/Login.vue"),
    beforeEnter() {
      /**
       *  @todo
       *  Add logout script
       *
       */
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
