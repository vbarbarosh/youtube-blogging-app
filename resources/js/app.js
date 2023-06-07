import Vue from 'vue';

// https://github.com/webpack/webpack/issues/625
// https://webpack.js.org/guides/dependency-management/#require-context
const require_components = require.context('./components', true, /\.vue$/);
require_components.keys().forEach(function (key) {
    const [, name] = key.match(/([^/]+)\.vue$/);
    Vue.component(name, require_components(key).default);
});

new Vue({
    el: '#app',
    template: '<app />'
});
