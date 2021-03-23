export default {
  setErrors: (state, data) => { state.errors = data },
  resetErrors: (state) => { state.errors = {} },
  setComments: (state, data) => { state.comments = data },
}
