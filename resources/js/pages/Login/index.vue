<template>
  <div class="login-page">
    <div class="form-wrapper">
      <form @submit.prevent="login">
        <h2>Entrar</h2>
        <Input
          label="E-mail"
          id="email"
          v-model="formData.email"
          :errorMessage="errors.email ? errors.email[0] : ''"
        />
        <Input
          label="Senha"
          id="passsword"
          type="password"
          v-model="formData.password"
          :errorMessage="errors.password ? errors.password[0] : ''"
        />
        <Button text="Entrar" :loading="loading" />
        <hr />
        <div class="not-registered">
          <router-link to="/register">
            <span>Ainda não possui uma conta?</span>
          </router-link>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    formData: {
      email: '',
      password: '',
    },
  }),

  computed: {
    ...mapGetters({
      errors: 'auth/getErrors',
      loading: 'getIsLoading',
    }),
  },

  methods: {
    async regiloginster() {
      const result = this.$store.dispatch('auth/login', this.formData)
      if (result) this.$router.push({ name: 'Home' })
    },
  },

  components: {
    Input: defineAsyncComponent(() => import('@component/input/Input')),
    Button: defineAsyncComponent(() => import('@component/button/Button')),
  },
}
</script>

<style lang="scss" scoped>
@import '@styleVariables';

.login-page {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background: $primary;
  min-height: 100vh;
  padding: 50px;

  .form-wrapper {
    background: $text-in-primary;
    border-radius: $border-radius;
    padding: 5px;
    width: 100%;
    max-width: 500px;

    form {
      background: $text-in-primary;
      border-radius: $border-radius;
      padding: 10px;
      box-shadow: 2px 2px 7px $border;

      h2 {
        color: $title;
        margin-bottom: 15px;
      }

      .input-component {
        margin-bottom: 15px;
      }

      .button-component {
        background: $secondary;
        margin: 15px 0;
      }

      .not-registered {
        margin: 15px 0;

        span {
          font-size: 14px;
          color: $text;
        }
      }
    }
  }
}
</style>
