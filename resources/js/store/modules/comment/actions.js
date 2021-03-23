import api, { headers } from '@/services/api'

export default {
  async create({ commit }, formData) {
    commit('resetErrors')
    commit('resetError')

    try {
      commit('setIsLoading', true, { root: true })
      await api.post('comments', formData, headers)
      commit('setIsLoading', false, { root: true })
      return true
    } catch ({ response }) {
      if (formData.lastCommented) {
        commit('setError', response.data.errors.description[0])
      } else {
        const index = formData.post_id
        commit('setErrors', { [index]: response.data.errors.description[0] })
      }
      commit('setIsLoading', false, { root: true })
      return false
    }
  },
}
