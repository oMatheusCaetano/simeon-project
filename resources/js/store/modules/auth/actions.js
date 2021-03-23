import api from '@/services/api'

export default {
  async register({ commit }, formData) {
    commit('resetErrors')

    try {
      commit('setIsLoading', true, { root: true })
      const data = await api.post('auth/register', formData)
      commit('setIsLoading', false, { root: true })
      // eslint-disable-next-line no-console
      console.log(`data ${data}`)
      return true
    } catch (err) {
      // eslint-disable-next-line no-console
      console.log(`error ${err}`)
      commit('setErrors', err.response.data)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async login({ commit }, formData) {
    commit('resetErrors')

    try {
      commit('setIsLoading', true, { root: true })
      const data = await api.post('auth/login', formData)
      commit('setIsLoading', false, { root: true })
      // eslint-disable-next-line no-console
      console.log(`data ${data}`)
      return true
    } catch (err) {
      // eslint-disable-next-line no-console
      console.log(`error ${err}`)
      commit('setErrors', err.response.data)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async logout({ commit }, formData) {
    commit('resetErrors')

    try {
      commit('setIsLoading', true, { root: true })
      const data = await api.post('auth/logout', formData)
      commit('setIsLoading', false, { root: true })
      // eslint-disable-next-line no-console
      console.log(`data ${data}`)
      return true
    } catch (err) {
      // eslint-disable-next-line no-console
      console.log(`error ${err}`)
      commit('setErrors', err.response.data)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },
}
