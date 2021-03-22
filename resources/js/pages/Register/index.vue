<template>
  <div class="register-page">
      <div>
        <form>
          <Title title="Cadastrar-se" />
          {{ formData.name }}
          <Input
            label="Nome"
            id="name"
            v-model="formData.name"
            errorMessage="Erro Aqui"
          />
          <Input
            label="E-mail"
             id="email"
          />
          <Input
            label="Senha"
            id="passsword"
            type="password"
          />
          <Input
            label="Repetir Senhta"
             id="password_confirmationi"
             ype="password"
          />
          <button>Realizar Cadastro</button>
        </form>
      </div>
  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  data: () => ({
    formData: {
      name: 'asasddas',
    },
  }),

  components: {
    Title: defineAsyncComponent(() => import('@component/text/Title')),
    Input: defineAsyncComponent(() => import('@component/input/Input')),
  },
}
</script>

<style>

</style>
