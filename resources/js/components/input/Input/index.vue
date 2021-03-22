<template>
  <div class="input-component">
    <label :for="id">{{ label }}</label>
    <input
      v-bind="$attrs"
      :id="id"
      :value="modelValue"
      @input="updateValue"
    />
    <small>{{ errorMessage }}</small>
  </div>
</template>

<script>
export default {
  props: {
    id: String,
    label: String,
    errorMessage: String,
    modelValue: String,
  },

  setup(_, context) {
    function updateValue({ target }) {
      context.emit('update:modelValue', target.value)
    }

    return { updateValue }
  },
}
</script>

<style lang="scss" scoped>
@import '@styleVariables';

.input-component {
  display: flex;
  flex-direction: column;

  label {
    font-size: 14px;
    color: $label;
  }

  input {
    height: 56px;
    width: 100%;
    border: 1px solid $border;
    border-radius: $border-radius;
    background: $input-background;
    padding: 0 10px;
    outline: none;
    color: $text;
  }

  small {
    color: $error;
    font-size: 12px;
  }
}

</style>
