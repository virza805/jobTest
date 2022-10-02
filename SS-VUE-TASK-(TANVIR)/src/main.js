import { createApp } from 'vue'

import StaffApp from './StaffApp.vue'

import './assets/app.scss'

import store from "./store"


const app = createApp(StaffApp)

app.use(store);

app.mount('#app')