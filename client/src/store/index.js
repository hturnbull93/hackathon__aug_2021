import { createStore } from "vuex";
import axios from "axios";

export default createStore({
  state() {
    return {
      loading: true,
      images: [],
      tags: []
    };
  },
  mutations: {
    SET_LOADING(state, loading) {
      state.loading = loading;
    },
    UPDATE_CONTENT(state, { tags = [], images = [] }) {
      state.images = images;
      state.tags = tags;
    }
  },
  actions: {
    updateImages({ commit }) {
      commit("SET_LOADING", true);

      axios
        .get("/api/data/")
        .then(({ data }) => data.result)
        .then(({ images, tags }) => {
          commit("SET_LOADING", false);
          commit("UPDATE_CONTENT", { tags, images });
        })
        .catch(e => console.error(e));
    }
  }
});
