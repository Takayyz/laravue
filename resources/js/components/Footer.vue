<template>
  <footer class="footer">
    <button class="button button--link" @click="logout">Logout</button>
    <RouterLink class="button button--link" to="/login">
      Login / Register
    </RouterLink>
  </footer>
</template>

<script>
export default {
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