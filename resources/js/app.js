require('./bootstrap');

// Vue V2 sintaxis
import vue from 'vue';

window.Vue = vue;

import App from './components/App.vue';

//importamos axios
import VueAxios from 'vue-axios';
import axios from 'axios';

//importamos y conf vue router
import VueRouter from 'vue-router';
import { routes } from './routes';
import Vue from 'vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode:'history',
    routes:routes
});

 const app = new Vue({
     el:'#app',
     router:router,
     render: h => h(App)
 });


//Vue V3 Sintaxis
// import { createApp } from 'vue';
// // window.Vue = vue;

// import App from './components/App.vue';

// //Importamos Axios
// import VueAxios from 'vue-axios';
// import axios from 'axios';

// //Importamos y conf vue router
// import { createWebHistory, createRouter } from 'vue-router';
// import routes from './routes';

// createApp(App).use(routes).use(VueAxios, axios).mount('#app');

// const router = createRouter({
//     history:createWebHistory(),
//     routes
// });

// const app = createApp({
//     el:'#app',
//     router:router,
//     render: h => h(App)
// })