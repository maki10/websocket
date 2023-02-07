import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

/**
 * Export Vuex store with strict mode and
 * middleware depending on config.ENV.debug setting for current environment
 *
 * @type {Vuex}
 */
export const store = new Vuex.Store({
    state: {
        token: localStorage.getItem('token'),
    },

    getters: {
        token: (state) => state,
    },

    mutations: {
        /**
         * This update token
         * @param state
         * @param payload
         */
        UPDATE_TOKEN(state, payload) {
            localStorage.setItem('token', payload)
            state.token = payload
        }
    },

    actions: {
        updateToken({commit}, payload) {
            commit('UPDATE_TOKEN', payload);
        }
    },

    strict: false,
});
