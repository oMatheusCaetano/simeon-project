import Vuex from 'vuex'

import auth from './modules/auth'
import post from './modules/post'
import comment from './modules/comment'

export default new Vuex.Store({
  modules: { auth, post, comment },

  state: { isLoading: false },

  getters: {
    getIsLoading: ({ isLoading }) => isLoading,
  },
  mutations: {
    setIsLoading: (state, value) => { state.isLoading = value },
  },
})
