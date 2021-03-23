<template>
  <div class="home-page">
    <nav>
      <div></div>
      <div>
        <router-link to="/post"><span>Novo Post</span></router-link>
        <span @click="logout">Logout</span>
      </div>
    </nav>

    <main>
      <ul>
        <li>
          <div class="post">
            <h3>Titulo do post</h3>
            <p>Descrição do post</p>
          </div>

          <div class="post-comment">
            <Input label="Comentar" textarea />
            <Button text="Salvar" />
          </div>

          <div>
            <div class="post-comments">
              <h5>Matheus Caetano</h5>
              <p>Algum commentatio</p>
            </div>
            <div class="post-comments">
              <h5>Matheus Caetano</h5>
              <p>Algum commentatio</p>
            </div>
          </div>
        </li>
      </ul>
    </main>

  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'

export default {
  methods: {
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
    padding: 100px 40px 50px;
    display: flex;
    justify-content: center;

    ul {
      list-style: none;
      width: 100%;
      max-width: 1100px;

      li {
        background: $text-in-primary;
        border-radius: $border-radius;
        padding: 10px;

        h3, h5 {
          color: $title;
        }

        p {
          color: $text;
        }

        .post {
          border-radius: $border-radius;
          box-shadow: 2px 2px 7px $border;
          padding: 20px 10px;
          margin: 10px;
        }

        .post-comment {

          .input-component {
            margin: 15px;
          }

          .button-component {
            background: $secondary;
            max-width: 200px;
            margin: 15px 15px 25px;
          }
        }

        .post-comments {
          padding: 10px 20px;

          p {
            font-size: 14px;
          }
        }
      }
    }
  }
}
</style>
