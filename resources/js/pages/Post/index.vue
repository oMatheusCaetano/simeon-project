<template>
  <div class="home-page">
    <nav>
      <div></div>
      <div>
        <router-link to="/"><span>Posts</span></router-link>
        <span @click="logout">Logout</span>
      </div>
    </nav>

    <main>
      <div class="form-wrapper">
        <form @submit.prevent="createPost">
          <h2>Criar Novo Post</h2>
          <Input
            label="Título"
            v-model="formData.title"
            :errorMessage="errors.title ? errors.title[0] : ''"
          />
          <Input
            textarea
            label="Descrição"
            v-model="formData.description"
            :errorMessage="errors.description ? errors.description[0] : ''"
          />

          <Button text="Criar Post" :loading="loading" />
        </form>
      </div>
    </main>
  </div>
</template>

<script>

import { defineAsyncComponent } from 'vue'
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    formData: {
      title: '',
      description: '',
    },
  }),

  computed: {
    ...mapGetters({
      errors: 'post/getErrors',
      loading: 'getIsLoading',
    }),
  },

  methods: {
    async createPost() {
      const result = await this.$store.dispatch('post/create', this.formData)
      if (result) this.$router.push({ name: 'Home' })
    },

    async logout() {
      const result = await this.$store.dispatch('auth/logout', this.formData)
      if (result) this.$router.push({ name: 'Login' })
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

.home-page {
  background: $primary;
  min-height: 100vh;

  nav {
    display: flex;
    justify-content: space-between;
    padding: 10px;

    span {
      cursor: pointer;
      margin: 0px 20px;
      color: $text-in-primary;
      transition: .3s;
    }
  }

  main {
    display: flex;
    justify-content: center;
    padding: 100px 40px 40px;

    .form-wrapper {
      width: 100%;
      max-width: 500px;
      background: $text-in-primary;
      border-radius: $border-radius;
      padding: 10px;

      form {
        background: $text-in-primary;
        box-shadow: 2px 2px 7px $border;
        border-radius: $border-radius;
        padding: 15px;

        h2 {
          margin: 20px 0;
        }

        .input-component {
          margin: 20px 0;
        }

        .button-component {
          background: $secondary;
          margin: 40px 0 25px;
        }
      }
    }
  }
}
</style>
