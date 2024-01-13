import { createApp } from 'vue'
import GlobalComponents  from '@/components/ui'
import App from './App.vue'
import router from './router'


const app = createApp(App)
app.use(router)
app.use(GlobalComponents)
app.mount('#app')
