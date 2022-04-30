require('./bootstrap');
import { createApp } from 'vue'
import 'flowbite'
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'
import Index from './components/Index'
import 'nprogress/nprogress.css'

const toastOptions = {
    toastClassName: 'binghr',
    bodyClassName: ['binghr'],
}
const App = createApp({})
App.component('index', Index)
App
  .use(Toast, toastOptions)
  .mount('#app')

