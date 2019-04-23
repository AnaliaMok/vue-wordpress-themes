import Vue from 'vue';
import DefaultLayout from './layouts/DefaultLayout.vue';
import App from './App.vue';

// Make console clean.
Vue.config.productionTip = false;

// Register Global Components.
Vue.component('Layout', DefaultLayout);

let app = document.getElementById('app');

new Vue({
  render: h => {
    return h(App, {
      props: {
        component: app.dataset.component,
        props: app.dataset.props ? JSON.parse(app.dataset.props) : null,
      },
    });
  },
}).$mount('#app');
