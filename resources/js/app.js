require('./bootstrap');

// window.Vue = require('vue');
import Vue from 'vue';


import Articles from './components/App.vue';

// Vue.component(
//     'articles',
//     require('./components/Articles.vue')
// );

const app = new Vue({
    el: '#app',
    
     render: h => h(Articles),

}); 
