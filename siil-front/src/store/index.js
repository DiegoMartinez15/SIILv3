import Vue from 'vue'
import Vuex from 'vuex'
import  createPersistedState  from  'vuex-persistedstate'



Vue.use(Vuex)


export default new Vuex.Store({
  state: {
    token: '',
    name:'',
    role:'',
    id:''
   
  },
  getters:{
      
  },
  mutations: {
    add(state, payload){
      if(payload != null){
        state.name = payload;
        return
      }
    },
    permission(state, payload){
      if(payload != null){
        state.role = payload;
        return
      }
    },
    setid(state, payload) {
      if (payload != null) {
          state.id = payload;
          return
      }

    }

  },
  actions:{
  },
    
  modules: {
   
  },
  plugins: [createPersistedState()]
})
