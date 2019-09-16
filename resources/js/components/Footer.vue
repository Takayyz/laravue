<template>
  <footer class="footer">
    <button v-if="isLogin" class="button button--link" @click="logout">Logout</button>
    <RouterLink v-else class="button button--link" to="/login">
      Login / Register
    </RouterLink>
  </footer>
</template>

<script>
export default {
  computed: {
    isLogin () {
      return this.$store.getters['auth/check']
    }
  },
  methods: {
    async logout () {
      // authストアのlogoutアクションを呼ぶ
      await this.$store.dispatch('auth/logout')
      // トップページへ遷移
      this.$router.push('/login')
    }
  }
}
</script>