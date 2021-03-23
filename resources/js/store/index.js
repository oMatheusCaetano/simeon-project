import Vuex from 'vuex'

import auth from './modules/auth'
import post from './modules/post'

export default new Vuex.Store({
  modules: { auth, post },

  state: { isLoading: false },

  getters: {
    getIsLoading: ({ isLoading }) => isLoading,
  },
  mutations: {
    setIsLoading: (state, value) => { state.isLoading = value },
  },
})
