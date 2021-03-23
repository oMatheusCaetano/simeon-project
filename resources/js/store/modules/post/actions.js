import api, { headers } from '@/services/api'

export default {
  async all({ commit }, payload) {
    commit('resetErrors')
    commit('resetError')
    const page = (payload && payload.page) || 1
    try {
      commit('setIsLoading', true, { root: true })
      const { data } = await api.get(`posts?page=${page}`, headers)
      commit('setIsLoading', false, { root: true })
      commit('setPosts', data)
      return true
    } catch ({ response }) {
      commit('setErrors', response.data.errors)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async lastCommented({ commit }) {
    commit('resetErrors')
    commit('resetError')
    try {
      commit('setIsLoading', true, { root: true })
      const { data } = await api.get('posts/lastCommented', headers)
      commit('setIsLoading', false, { root: true })
      commit('setLastCommented', data)
      return true
    } catch ({ response }) {
      commit('setErrors', response.data.errors)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },

  async create({ commit }, formData) {
    commit('resetErrors')
    commit('resetError')

    try {
      commit('setIsLoading', true, { root: true })
      await api.post('posts', formData, headers)
      commit('setIsLoading', false, { root: true })
      return true
    } catch ({ response }) {
      commit('setErrors', response.data.errors)
      commit('setIsLoading', false, { root: true })
      return false
    }
  },
}
