import Vuex from 'vuex'

import auth from './modules/auth'

export default new Vuex.Store({
  modules: {
    auth,
  },

  state: {
    isLoading: false,
  },

  getters: {
    getIsLoading: ({ isLoading }) => isLoading,
  },
  mutations: {
    setIsLoading: (state, value) => { state.isLoading = value },
  },
})
