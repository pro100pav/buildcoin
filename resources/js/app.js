import { createApp } from 'vue'
import GlobalComponents  from '../js/components/ui'
import App from '../js/App.vue'
import router from '../js/router'


const app = createApp(App)
app.use(router)
app.use(GlobalComponents)
app.mount('#app')
