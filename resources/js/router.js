import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポート
import PhotoList from './pages/PhotoList.vue'
import Login from './pages/Login.vue'

// VueRouterプラグインを使用
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/',
    component: PhotoList
  },
  {
    path: '/login',
    component: Login
  }
]

// VueRouterインスタンスを作成
const router = new VueRouter({
  mode: 'history', // historyAPIを用いたURLシミュレート
  routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router