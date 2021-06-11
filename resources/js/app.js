require('./bootstrap');
import Vue from "vue";
Vue.component('base-component', require('./components/BaseComponent.vue').default);
Vue.component('first-step-component', require('./components/StepOneComponent.vue').default);
Vue.component('second-step-component', require('./components/StepTwoComponent.vue').default);
Vue.component('third-step-component', require('./components/StepThreeComponent.vue').default);
Vue.component('buttons-component', require('./components/ButtonsComponent.vue').default);

const app = new Vue({
    el: '#app'
});
