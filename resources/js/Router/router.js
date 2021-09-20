import Vue from 'vue'
import VueRouter from 'vue-router'

import CategoriComponent from '../components/categori/CategoriComponent.vue'
import CreateCategori from '../components/categori/CreateCategori.vue'
import EditCategori from '../components/categori/EditCategori.vue'

import TiketComponent from '../components/tiket/TiketComponent.vue'
import CreateTiket from '../components/tiket/CreateTiket.vue'
import EditTiket from '../components/tiket/EditTiket.vue'

import TransaksiComponent from '../components/transaksi/TransaksiComponent.vue'
const routes = [
    { name: 'categori', path: '/categori', component: CategoriComponent },
    { name: 'createcategori', path: '/categori/create', component: CreateCategori },
    { name: 'editcategori', path: '/categori/edit/:id', component: EditCategori },
    
    { name: 'tiket', path: '/tiket', component: TiketComponent },
    { name: 'createtiket', path: '/tiket/create', component: CreateTiket },
    { name: 'edittiket', path: '/tiket/edit/:id', component: EditTiket },
    
    { name: 'transaksi', path: '/transaksi', component: TransaksiComponent },
    ]

Vue.use(VueRouter)
const router = new VueRouter({
    routes, // short for 'routes: routes'
    hasbang:false,
    mode:'history'
})
export default router