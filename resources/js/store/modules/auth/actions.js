import api from '@/services/api'

export default {
  async register({ commit }, formData) {
    commit('resetErrors')
    try {
      commit('setIsLoading', true, { root: true })
      await api.post('register', formData)
      commit('setIsLoading', false, { root: true })
      return true
    } catch (err) {
      commit('setErrors', err.response.data)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },
}
