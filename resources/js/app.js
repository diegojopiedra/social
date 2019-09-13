/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('new-tweet', require('./components/NewTweet.vue').default);
Vue.component('user-component', require('./components/User.vue').default);
Vue.component('profile-img', require('./components/ProfileImg.vue').default);
Vue.component('follow-btn', require('./components/FollowBtn.vue').default);
Vue.component('custom-galery', require('./components/Photos.vue').default);
Vue.component('image-btn', require('./components/ImageBtn.vue').default);
Vue.component('like-btn', require('./components/LikeBtn.vue').default);
Vue.component('vue-easy-lightbox', require('vue-easy-lightbox').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
