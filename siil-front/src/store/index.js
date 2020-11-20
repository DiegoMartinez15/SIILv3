import Vue from 'vue'
import Vuex from 'vuex'



Vue.use(Vuex)


export default new Vuex.Store({
    state: {
        token: '',
        id: ''

    },
    getters: {

    },
    mutations: {
        setid(state, payload) {
            if (payload != null) {
                state.id = payload;
                return
            }
        }
    },
    actions: {},

    modules: {

    }
})