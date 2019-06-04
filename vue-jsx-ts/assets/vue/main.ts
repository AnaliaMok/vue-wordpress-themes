import Vue from 'vue';
import App from './App';

// Make console clean.
Vue.config.productionTip = false;

new Vue({
  render: h => {
    const app: HTMLElement|null = document.getElementById('app');
    return h(App, {
      props: {
        component: app && app.dataset ? app.dataset.component : null,
        props: app && app.dataset.props ? JSON.parse(app.dataset.props) : null,
      },
    });
  },
}).$mount('#app');
