import UInput from '../../components/ui/UInput.vue'
import ULoader from '../../components/ui/ULoader.vue'
import UNavigate from '../../components/ui/UNavigate.vue'
import UButton from '../../components/ui/UButton.vue'
import Footer from '../../components/ui/Footer.vue'

const components = [
    {name: 'UInput', component: UInput},
    {name: 'ULoader', component: ULoader},
    {name: 'UNavigate', component: UNavigate},
    {name: 'UButton', component: UButton},
    {name: 'Footer', component: Footer},
]

export default {
    install(app){
        components.forEach(({name, component}) => {
            app.component(name, component)
        })
    }
}