import { createApp } from 'vue'
import Index from './components/Index'

const App = createApp({})
App.component('index', Index)
App.mount('#app')
