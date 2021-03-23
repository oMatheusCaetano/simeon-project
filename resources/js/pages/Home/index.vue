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
      <p
        class="no-posts"
        v-if="posts.data?.length === 0 && lastCommented.title == null"
      >
        Nenhum post cadastrado
      </p>

      <div class="last-commented-wrapper" v-if="lastCommented.title != null">
        <h4>Último post comentado</h4>
        <div class="last-commented">
          <div class="post">
            <h3>{{ lastCommented.title }}</h3>
            <p>{{ lastCommented.description }}</p>
          </div>

          <form class="post-comment" @submit.prevent="createLastComment(lastCommented.id)">
            <Input
              label="Comentar"
              textarea
              v-model="lastComment.description"
              :errorMessage="error && error.length > 0 ? error : ''"
            />
            <Button text="Salvar" :loading="loading" />
          </form>

          <div class="comments-wrapper">
            <div class="post-comments">
              <h5>{{ lastCommented.name }}</h5>
              <p>{{ lastCommented.comment }}</p>
            </div>
          </div>
        </div>
      </div>

      <ul v-if="posts.data?.length > 0">
        <h4>Posts</h4>

        <li v-for="(post, index) in posts.data" :key="index">
          <div class="post">
            <h3>{{ post.title }}</h3>
            <p>{{ post.description }}</p>
          </div>

          <form class="post-comment" @submit.prevent="createComment(post.id)">
            <Input
              label="Comentar"
              textarea
              v-model="formData[post.id]"
              :errorMessage="errors[post.id] ?? ''"
            />
            <Button text="Salvar" :loading="loading" />
          </form>

          <div class="comments-wrapper">
            <div class="post-comments" v-for="(comment, index) in post.comments" :key="index">
              <h5>{{ comment.name }}</h5>
              <p>{{ comment.description }}</p>
            </div>
          </div>
        </li>

        <div class="paginator">
          <Button text="Anterior" :loading="loading" @click="previousPage" />
          <p>{{ posts.current_page }}</p>
          <Button text="Próximo" :loading="loading" @click="nextPage" />
        </div>
      </ul>
    </main>

  </div>
</template>

<script>
import { defineAsyncComponent } from 'vue'
import { mapGetters } from 'vuex'

export default {
  data: () => ({
    formData: [],
    lastComment: {
      description: '',
    },
  }),

  computed: {
    ...mapGetters({
      errors: 'comment/getErrors',
      error: 'comment/getError',
      posts: 'post/getPosts',
      lastCommented: 'post/getLastCommented',
      loading: 'getIsLoading',
    }),
  },

  methods: {
    async logout() {
      const result = await this.$store.dispatch('auth/logout', this.formData)
      if (result) this.$router.push({ name: 'Login' })
    },

    nextPage() {
      if (this.posts.current_page >= this.posts.last_page) return
      this.$store.dispatch('post/all', { page: this.posts.current_page + 1 })
    },

    previousPage() {
      if (this.posts.current_page <= 1) return
      this.$store.dispatch('post/all', { page: this.posts.current_page - 1 })
    },

    async createLastComment(postId) {
      const form = {
        post_id: postId,
        description: this.lastComment.description,
        lastCommented: true,
      }
      const result = await this.$store.dispatch('comment/create', form)
      if (result) {
        await this.$store.dispatch('post/all', { page: this.posts.current_page })
        await this.$store.dispatch('post/lastCommented')
        this.lastComment.description = ''
      }
    },

    async createComment(postId) {
      const form = {
        post_id: postId,
        description: this.formData[postId],
      }
      const result = await this.$store.dispatch('comment/create', form)
      if (result) {
        await this.$store.dispatch('post/all', { page: this.posts.current_page })
        await this.$store.dispatch('post/lastCommented')
        this.formData[postId] = ''
      }
    },
  },

  async created() {
    await this.$store.dispatch('post/all')
    await this.$store.dispatch('post/lastCommented')
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
    padding: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;

    .no-posts {
      margin-top: 100px;
      color: $text-in-primary;
    }

    h4 {
      color: $text-in-primary;
      margin: 20px 0 10px;
      text-align: center;
    }

    .last-commented-wrapper {
      width: 100%;
      max-width: 1100px;
    }

    li, .last-commented {
      background: $text-in-primary;
      border-radius: $border-radius;
      padding: 10px;
      margin-bottom: 15px;
      width: 100%;

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

      .comments-wrapper {
        overflow: auto;
        max-height: 300px;

        .post-comments {
          padding: 10px 20px;

          p {
            font-size: 14px;
          }
        }
      }
    }

    ul {
      list-style: none;
      width: 100%;
      max-width: 1100px;
    }
  }

  .paginator {
    display: flex;
    margin-top: 20px;

    p {
      color: $text-in-primary;
      margin-top: 15px;
    }

    .button-component {
      margin: 0px 20px 40px;
    }
  }
}
</style>
