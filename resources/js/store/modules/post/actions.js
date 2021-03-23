import api from '@/services/api'

export default {
  async createPost({ commit }, formData) {
    commit('resetErrors')

    try {
      commit('setIsLoading', true, { root: true })
      const data = await api.post('posts', formData)
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
