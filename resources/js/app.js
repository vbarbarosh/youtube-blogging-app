import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const app = JSON.parse(JSON.stringify(window.YoutubeBloggingApp));

Vue.mixin({
    data: function () {
        return {
            app,
        };
    },
    methods: {
        // Generated ids are bound to current element. They are
        // necessary for `id` and `label[for]` attributes. Name
        // `uid` was chosen to not conflict with `id` attribute
        // which naturally can be specified for each element.
        // For example take a look at `input-checkbox`.
        // https://github.com/vuejs/vue/issues/5886
        // https://github.com/vuejs/vue/issues/4958
        uid: function (name) {
            return name ? `c${this._uid}_${name}` : `c${this._uid}`;
        },
        emit_input: function (value) {
            this.$emit('input', value);
        },
    }
});

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
