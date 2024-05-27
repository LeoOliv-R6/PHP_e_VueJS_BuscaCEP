import Vue from "vue";
import Router from "vue-router";
import FindCep from "./view/FindCep.vue";
import Home from "./view/Home.vue";

Vue.use(Router);

const router = new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
        path: "/",
        name: "HomePage",
        component: Home
    },
    {
      path: "/findcep",
      name: "findcep",
      component: FindCep
    },
  ],
});

export default router;
