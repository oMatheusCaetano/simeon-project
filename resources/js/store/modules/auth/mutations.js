export default {
  setErrors: (state, data) => { state.errors = data },
  resetErrors: (state) => { state.errors = {} },
  setError: (state, data) => { state.error = data },
  resetError: (state) => { state.error = '' },
}
