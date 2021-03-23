<template>
  <div class="input-component">
    <label :for="id">{{ label }}</label>
    <textarea
      v-bind="$attrs"
      :id="id"
      :value="modelValue"
      @input="updateValue"
      v-if="textarea"
    ></textarea>

    <input
      v-bind="$attrs"
      :id="id"
      :value="modelValue"
      @input="updateValue"
      v-else
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
    textarea: Boolean,
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

  input, textarea {
    height: 56px;
    width: 100%;
    border: 1px solid $border;
    border-radius: $border-radius;
    background: $input-background;
    padding: 0 10px;
    outline: none;
    color: $text;
  }

  textarea {
    padding: 10px;
    max-width: 100%;
  }

  small {
    color: $error;
    font-size: 12px;
  }
}

</style>
