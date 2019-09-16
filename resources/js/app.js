import Vue from 'vue'
// ルーティング定義import
import router from './router'
// ストアimport
import store from './store'
// ルートコンポーネントimport
import App from './App.vue'
// bootstrap設定import
import './bootstrap'

new Vue({
  el: '#app',
  router, // ルーティング定義読み込み
  store, // ストア読み込み
  components: { App }, // ルートコンポーネントの使用宣言
  template: '<App />' // ルートコンポーネント描画
})
