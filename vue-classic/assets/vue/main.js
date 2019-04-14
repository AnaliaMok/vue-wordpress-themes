import Vue from 'vue';
import DefaultLayout from './layouts/DefaultLayout.vue';
import App from './App.vue';

Vue.component('Layout', DefaultLayout);

let app = document.getElementById('app');

new Vue({
  data: {
    component: '',
    props: {}
  },
  render: h => {
    return h(App, {
      props: {
        component: app.dataset.component || 'Page',
        props: JSON.parse(app.dataset.props)
      }
    });
  }
}).$mount('#app');
