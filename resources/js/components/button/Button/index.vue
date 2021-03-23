<template>
  <div class="button-component">
    <button v-bind="$attrs" :disabled="loading">
      {{ loading ?  'Carregando...' : text }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    text: String,
    loading: Boolean,
  },
}
</script>

<style lang="scss" scoped>
@import '@styleVariables';

.button-component {
  height: 56px;
  border-radius: $border-radius;

  button {
    height: 100%;
    width: 100%;
    outline: none;
    border: none;
    background: transparent;
    color: white;
    font-weight: 600;

    &:hover {
    cursor: pointer;
  }
  }
}
</style>
