<template>
  <div class="home-page">
    <nav>
      <div></div>
      <div>
        <router-link to="/post"><span>Novo Post</span></router-link>
        <span @click="logout">Logout</span>
      </div>
    </nav>

  </div>
</template>

<script>

export default {
  methods: {
    async logout() {
      const result = await this.$store.dispatch('auth/logout', this.formData)
      if (result) this.$router.push({ name: 'Login' })
    },
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
}
</style>
