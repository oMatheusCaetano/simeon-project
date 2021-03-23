import api, { headers } from '@/services/api'

export default {
  async register({ commit }, formData) {
    commit('resetErrors')
    commit('resetError')

    try {
      commit('setIsLoading', true, { root: true })
      await api.post('users', formData)
      commit('setIsLoading', false, { root: true })
      return true
    } catch ({ response }) {
      if (response.status === 401) {
        commit('setError', response.data.error)
      } else {
        commit('setErrors', response.data.errors)
      }
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async login({ commit }, formData) {
    commit('resetErrors')
    commit('resetError')

    try {
      commit('setIsLoading', true, { root: true })
      const data = await api.post('auth/login', formData)
      localStorage.setItem('api_token', data.data.token)
      commit('setIsLoading', false, { root: true })
      return true
    } catch ({ response }) {
      if (response.status === 401) {
        commit('setError', response.data.error)
      } else {
        commit('setErrors', response.data.errors)
      }
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async logout({ commit }) {
    commit('resetErrors')
    commit('resetError')

    try {
      commit('setIsLoading', true, { root: true })
      await api.get('auth/logout', headers)
      localStorage.removeItem('api_token')
      commit('setIsLoading', false, { root: true })
      return true
    } catch ({ response }) {
      commit('setIsLoading', false, { root: true })
      return false
    }
  },
}
